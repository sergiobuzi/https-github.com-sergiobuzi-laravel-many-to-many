<template>
    <h1>Technologies</h1>

    <ul>
        <li v-for="technology in technologies" :key="technology.id">

            <div>{{ technology.name }}</div>
            <div>{{ technology.version }}</div>
            <br>

        </li>
    </ul>

</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ApiContent',
        data(){
            return{
                technologies: []
            }
        },
        mounted() {


            axios.get('http://127.0.0.1:8000/api/v1/technologies')
            .then(res => {

                const data = res.data;
                if (data.status == 'success')
                    this.technologies = data.technologies;

                console.log('technologies:', this.technologies)
            })
            .catch(err => {
                console.err(err);
            })

        }
    }
</script>