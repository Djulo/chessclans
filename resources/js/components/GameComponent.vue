
<template>
    <div id="board" class="container board"></div>
</template>




<script>
    import Event from '../event.js';
    //var mylib = require('../../../public/js/game');
    export default {
        data() {
            return {
                moves: []
            }
        },
        mounted() {
            // axios.get('/move').then((response) => {
            //     this.moves = response.data;
            // });
            // Event.$on('added_message', (message) => {
            //     this.messages.push(message);
            //     if(message.selfMessage) {
            //         this.$refs.message.scrollTop = 0;
            //     }
            // });
        },
        methods: {
            // listen() {
            //     Echo.channel('chat').listen('MessageCreated', (message) => {
            //         this.messages.push(message);
            //         if(message.selfMessage) {
            //             this.$refs.message.scrollTop = 0;
            //         }
            //     })
            // }
        }
    }
</script>




<style>
    #board {
        width: 400px;
    }
</style>

