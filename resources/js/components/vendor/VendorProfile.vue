<template>
    <form  @submit.prevent="saveVendor">
        <div class="box-body">
            <div class="form-group">
                <label for="Name">Vendor Name</label>
                <input type="text" class="form-control" v-model="vendor.name" placeholder="Enter Vendor Name" required>
                <span style="color:red" v-for="error in errors.name" v-bind:key="error" >{{ error }}</span>
            </div>
            <div class="form-group">
                <label for="Name">Web URL</label>
                <input type="text" class="form-control" v-model="vendor.web_url" placeholder="Enter Web URL" >
            </div>
            <div class="form-group">
                <label for="Name">Contact No</label>
                <input type="text" class="form-control" v-model="vendor.contact_no" placeholder="Enter Contact Number" >
            </div>
            <div class="form-group" >
                <label for="Password">Vendor Logo</label>
                <div>
                    <input type="file" name="image_file" @change="getImage" ref="fileInput" enctype="multipart/form-data" >
                    <img :src="vendor.image" alt="image" width="200" height="200" class="img-circle" >
                    <span style="color:red" v-for="error in errors.image" v-bind:key="error" >{{ error }}</span>
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
                vendor: {
                    name: null,
                    web_url: null,
                    image: '/img/admin/vendor.png',
                    auth_id: null,
                    contact_no: null
                },
                errors: {
                    name: [],
                    image: []
                }
            }
        },
        props: {
            vendor_loarded: {
                type: Object,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        mounted() {
            if(this.user.role_id !=3) {
                window.location = '/home'
            }
            this.vendor.name = this.vendor_loarded.name;
            this.vendor.web_url = this.vendor_loarded.web_url;
            this.vendor.image = this.vendor_loarded.image;
            this.vendor.contact_no = this.vendor_loarded.contact_no;
        },
        methods: {
            saveVendor() {
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
            
                axios.post('vendor/save', JSON.stringify(this.vendor), { headers })
                .then(res => {
                    console.log(res);
                    // window.location = res.data.redirect;
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
                    this.vendor.image = event.target.result;
                }
            }
        }
    }
</script>
