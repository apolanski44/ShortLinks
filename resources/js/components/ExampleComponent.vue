<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="url">Wprowadz link:</label>
                            <input type="text" v-model="url" class="form-control" id="url" placeholder="https://example.com">
                        </div>
                        <button @click="shortenUrl" class="btn btn-primary">Skroc link</button>
                        <button @click="showLinks" class="btn btn-secondary mt-3">Pokaz wszystkie linki</button>
                        <table v-if="allLinks.length" class="table mt-3">
                            <thead>
                                <tr>
                                    
                                    <th>Oryginalny URL</th>
                                    <th>Skrocony URL</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="link in allLinks" :key="link.id">
                                    
                                    <td><a :href="link.url" target="_blank">{{ link.url }}</a></td>
                                    <b><td><a :href="`http://127.0.0.1:8000/${link.short_url}`" target="_blank">{{ link.short_url }}</a></td></b>
                                   
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="shortenedUrl" class="mt-3">
                            <p>Skrocony link:</p>
                            <a :href="shortenedUrl" target="_blank">{{ shortenedUrl }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            url: '',
            shortenedUrl: '',
            allLinks: []
        };
    },
    methods: {
        async shortenUrl() {
            if (!this.url) {
                alert('Prosze podac link');
                return;
            }

            try {
                const response = await axios.post('/shorten', { url: this.url });
                this.shortenedUrl = response.data.short_url;
            } catch (error) {
                console.error('Blad skracania', error);
                alert('Blad podczas skracania linku.');
            }
        },
        async showLinks() {
            try {
                const response = await axios.get('/getLinks');
                this.allLinks = response.data;
            } catch (error) {
                console.error('blad', error);
            }
        }
    },
    mounted() {
        console.log('Component mounted.');
    }
}
</script>
<style scoped>
.container {
    margin-top: 50px;
}
.card {
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}
.card-header {
    font-size: 18px;
    font-weight: bold;
    background-color: #007bff;
    color: white;
}
.form-group {
    margin-bottom: 15px;
}
input {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ddd;
    width: 100%;
}
button {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
}
.btn-primary {
    background-color: #007bff;
    border: none;
}
.btn-primary:hover {
    background-color: #0056b3;
}
.result-box {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    margin-top: 15px;
}
.shortened-link {
    font-size: 18px;
    font-weight: bold;
    color: #007bff;
    text-decoration: none;
}
.shortened-link:hover {
    text-decoration: underline;
}
</style>