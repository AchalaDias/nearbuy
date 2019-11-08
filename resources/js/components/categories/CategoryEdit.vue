<template>
    <form  @submit.prevent="saveCategory">
        <div class="box-body">
            <div class="form-group">
                <label for="Name">Category Name</label>
                <input type="text" class="form-control" v-model="category.name" placeholder="Enter Category Name" required>
                <span style="color:red" v-for="error in errors.name" v-bind:key="error" >{{ error }}</span>
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
                    <img :src="category.image_path" alt="image" width="300" height="300" class="img-thumbnail">
                    <span style="color:red" v-for="error in errors.image_path" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
        </div>
        <div class="box-footer" >
            <button type="submit" class="btn btn-primary">Save</button>
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
                    id: null,
                    image_path: '/img/admin/uploard.png',
                    parent: null,
                    status: false
                },
                image_show: false,
                errors: {
                    name: [],
                    category_id: [],
                    image_path: []
                }
            }
        },
        props: {
            category_data: {
                type: Object,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        mounted() {
            this.category.name = this.category_data.name;
            this.category.id = this.category_data.id;
            this.category.image_path = this.category_data.image_path;
            this.category.parent = this.category_data.parent;
            if(this.category_data.status == 1) {
                this.category.status = true;
            }
             if(this.category_data.parent == 0 ) {
                this.image_show = true;
            } 
        },
        methods: {
            saveCategory() {
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
                if(this.category.status) {
                    this.category.status = 1;
                } else {
                    this.category.status = 0;
                }
                axios.post('edit/submit', JSON.stringify(this.category), { headers })
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
                    this.category.image_path = event.target.result;
                }
            }
        }
    }
</script>
