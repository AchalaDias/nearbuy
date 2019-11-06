<template>
  <div>
    <h1>This is your first component in Vue</h1>
    <h3>{{ message }}</h3>
  </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Powered by MDB!"
        }   
    },
    mounted() {
            
    }
}
</script>