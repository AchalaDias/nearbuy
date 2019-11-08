<template>
    <span class="badge orange z-depth-1 mr-1"> {{ count }} </span>
</template>

<script>
export default {
        data() {
            return {
                count: 0
            }
        },
        mounted() {
          this.getCount();
        },
        methods: {
            getCount() {
                let headers = {
                    'Content-Type': 'application/json;charset=utf-8'
                };
                axios.get('/web/wishlist/count', { headers })
                .then(res => {
                    // console.log(res);
                    this.count = res.data.count;
                    // window.location = res.data.redirect;
                }).catch(err => {
                    // console.log(err.response.data.errors);
                });
            }
        }
};
</script>