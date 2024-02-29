<template>
    <h1>Technologies</h1>

    <form v-if="createFormActive" @submit.prevent="submitNewTechnology">

        <label for="name">name</label>
        <input type="text" name="name" id="name" v-model="newTechnology.name">
        <br>
        <label for="version">version</label>
        <input type="text" name="version" id="version" v-model="newTechnology.version">
        <br>
        <input type="submit" value="invio">
        
    </form>

    
    
    <div v-else>
        <button @click="toggleCreateNewTechnology">Nuova Tech</button>
        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <div>{{ technology.name }}</div>
                <div>{{ technology.version }}</div>
                <br>
            </li>
        </ul>
    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ApiContent',
        data(){
            return{
                technologies: [],

                createFormActive: false,

                newTechnology: {
                    name: '',
                    version: '',
                }
            }
        },

        methods: {

            toggleCreateNewTechnology() {
                this.createFormActive = true;
            },

            submitNewTechnology(){
                axios.post('http://127.0.0.1:8000/api/v1/technologies', this.newTechnology)
                .then(res => {

                    const data = res.data;

                    console.log(data);
    
                })
                .catch(err => {
                console.err(err);
                });

            }
        },

        mounted() {


            axios.get('http://127.0.0.1:8000/api/v1/technologies')
            .then(res => {

                const data = res.data;
                console.log(res.data);

                if (data.status == 'success'){
                    this.technologies=(data.technologies);
                    this.createFormActive = false;
                }
                    
            })
            .catch(err => {
                console.err(err);
            })

        }
    }
</script>

<style>

ul{
    list-style: none;
}

</style>