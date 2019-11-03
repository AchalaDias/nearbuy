<template>
    <form  @submit.prevent="createCategory">
        <div class="box-body">
            <div class="form-group">
                <label for="Name">Category Name</label>
                <input type="text" class="form-control" v-model="category.name" placeholder="Enter Category Name" required>
                <span style="color:red" v-for="error in errors.name" v-bind:key="error" >{{ error }}</span>
            </div>
            <div class="form-group">
                <label for="Password">Categories Type</label>
                <div class="form-group">
                    <select class="form-control" placeholder="Select..." v-model="category.category_id" @change="checkRoot" equired>
                        <option  disabled selected>Select....</option>
                            <option  v-for="category in categories"  v-bind:key="category.id" :value="category.id" :disabled="category.parent != 0">{{ category.name }}</option>
                    </select>
                    <span style="color:red" v-for="error in errors.category_id" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
            <div class="form-group" v-if="user.role_id == 1 || user.role_id == 2">
                <label for="Password">Display Status</label>
                <div class="box-body">
                    <input type="checkbox" class="minimal" id="checkbox" v-model="category.status">
                </div>
            </div>
            <div class="form-group" v-show="image_show">
                <label for="Password">Root Category Image</label>
                <div>
                    <input type="file" name="image_file" @change="getImage" ref="fileInput" enctype="multipart/form-data" >
                    <img :src="category.image" alt="image" width="300" height="300" class="img-thumbnail">
                    <span style="color:red" v-for="error in errors.image" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
        </div>
        <div class="box-footer" >
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                category: {
                    name: null,
                    category_id: null,
                    image: '/img/admin/uploard.png',
                    status: false
                },
                image_show: false,
                errors: {
                    name: [],
                    category_id: [],
                    image: []
                }
            }
        },
        props: {
            main_categories: {
                type: Array,
                required: true
            },
            sub_categories: {
                type: Array,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        mounted() {
            // Ordering the main categories and sub categories before loard the page 
            console.log(this.user.role_id);
            if(this.user.role_id != 1 && this.user.role_id != 2 ){
                this.main_categories.shift();
            }
            this.main_categories.forEach(main_categorie => {
                this.categories.push(main_categorie);
                this.sub_categories.forEach(sub_categorie => {
                    if(main_categorie.id == sub_categorie.parent) {
                        sub_categorie.name = ' -- ' + sub_categorie.name;
                        this.categories.push(sub_categorie);
                    }
                });
            });
        },
        methods: {
            createCategory() {
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
                if(this.category.status) {
                    this.category.status = 1;
                } else {
                    this.category.status = 0;
                }
                axios.post('submit', JSON.stringify(this.category), { headers })
                .then(res => {
                    console.log(res);
                    window.location = res.data.redirect;
                }).catch(err => {
                    this.errors = err.response.data.errors;
                    console.log(err.response.data.errors);
                });
            },
            getImage(event) {
                let image = event.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = event => {
                    this.category.image = event.target.result;
                }
            },
            checkRoot() {
                this.image_show = false;
                const input = this.$refs.fileInput;
                input.type = 'text';
                input.type = 'file';
                this.errors.image = [];
                this.category.image = '/img/admin/uploard.png';
                if(this.category.category_id == 1 ) {
                    this.image_show = true;
                } 
            }
        }
    }
</script>
