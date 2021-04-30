<template>
    <div>
    <button v-for="(color, theme) in themes" type="submit" 
    class="rounded-circle p-2 mr-2 border-0"
    :class= "{'btn-primary' : selectedTheme == theme}"
    :style="{backgroundColor : color }"
     @click="selectedTheme = theme"></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                themes : {
                    'theme-light' : '#fff',
                    'theme-dark' : '#222'
                },
                selectedTheme : 'theme-light'
            }
        },
        created() {
            this.selectedTheme = localStorage.getItem('theme') || 'theme-light';
        },
        watch: {
            selectedTheme() {
                document.body.className = document.body.className.replace(/theme-\w+/, this.selectedTheme);
                localStorage.setItem('theme', this.selectedTheme);
            }
        }
    }
</script>
