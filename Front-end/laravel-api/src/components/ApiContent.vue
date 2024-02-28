<template>
    <h1>HelloWorld</h1>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ApiContent',

        mounted() {


            axios.get('http://127.0.0.1:8000/api/v1/test')
            .then(res => {

                const data = res.data;
                console.log(data);
            })
            .catch(err => {
                console.err(err);
            })

        }
    }
</script>