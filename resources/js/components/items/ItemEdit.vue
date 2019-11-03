<template>
    <form  @submit.prevent="createCategory">
        <div class="box-body">
            <div class="form-group ">
                <label for="Name">Title</label>
                <input type="text" class="form-control" v-model="item.title" placeholder="Enter Item Title" required>
                <span style="color:red" v-for="error in errors.title" v-bind:key="error" >{{ error }}</span>
            </div>
            <div class="form-group ">
                <label for="Password">Categories</label>
                <div class="form-group">
                    <select class="form-control select2" placeholder="Select..."  id="category_id" required>
                        <option  disabled selected>Select....</option>
                            <option  v-for="category in categories"  v-bind:key="category.id" :value="category.id" :disabled="category.parent == 0">{{ category.name }}</option>
                    </select>
                    <span style="color:red" v-for="error in errors.category_id" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
            <div class="form-group " >
                <label for="Password">Item Banner</label>
                <div>
                    <input type="file" name="image_file" @change="getImage" ref="fileInput" enctype="multipart/form-data" >
                    <img :src="item.image" alt="image" width="200" height="200" class="img-thumbnail" required>
                    <span style="color:red" v-for="error in errors.image" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
            <div class="form-group ">
                <label>Promotion Start Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"  id="promo_start" required>
                    <span style="color:red" v-for="error in errors.promo_start" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
            <div class="form-group ">
                <label>Promotion End Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"  id="promo_end" required>
                    <span style="color:red" v-for="error in errors.promo_end" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
            <div class="form-group ">
                <label for="Password">Description</label>
                <div class="box-body pad">
                    <textarea class="textarea" id="description"  placeholder="Place your description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <span style="color:red" v-for="error in errors.description" v-bind:key="error" >{{ error }}</span>
                </div>
            </div>
            <div class="form-group"  v-if="user.role_id == 1 || user.role_id == 2">
                <label for="Password">Display Status</label>
                <div class="box-body">
                    <input type="checkbox" class="minimal" id="checkbox" v-model="item.status">
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
                item: {
                    id: null,
                    title: null,
                    description: null,
                    category_id: null,
                    image: '/img/admin/uploard.png',
                    status: false,
                    promo_start: null,
                    promo_until: null
                },
                image_show: false,
                errors: {
                    title: [],
                    category_id: [],
                    image: [],
                    promo_start: [],
                    promo_until: [],
                    description: []
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
            edit_item: {
                type: Object,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        mounted() {
            // Ordering the main categories and sub categories before loard the page 
            this.main_categories.forEach(main_categorie => {
                this.categories.push(main_categorie);
                this.sub_categories.forEach(sub_categorie => {
                    if(main_categorie.id == sub_categorie.parent) {
                        sub_categorie.name = ' -- ' + sub_categorie.name;
                        this.categories.push(sub_categorie);
                    }
                });
            });
             if(this.edit_item.status == 1) {
                this.item.status = true;
            }
            this.item.id = this.edit_item.id;
            this.item.title = this.edit_item.title;
            this.item.image = this.edit_item.image;
            document.getElementById('category_id').value = this.edit_item.category_id;
            document.getElementById('description').value = this.edit_item.description;
            document.getElementById('promo_start').value = this.edit_item.promo_start;
            document.getElementById('promo_end').value = this.edit_item.promo_until;
        },
        methods: {
            createCategory() {
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
                this.item.category_id = Number(document.getElementById('category_id').value);
                this.item.description = document.getElementById('description').value;
                this.item.promo_start = document.getElementById('promo_start').value;
                this.item.promo_until = document.getElementById('promo_end').value;
                console.log(this.item);
                if(this.item.status) {
                    this.item.status = 1;
                } else {
                    this.item.status = 0;
                }
                axios.post('edit/submit', JSON.stringify(this.item), { headers })
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
                    this.item.image = event.target.result;
                }
            }
        }
    }
</script>
