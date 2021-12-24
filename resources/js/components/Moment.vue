<template>
<div>
   <span v-text="momento"></span>
</div>
</template>

<script>

    export default {
        props:['valor'],
        computed:{momento(){
            console.log(this.valor)
return moment(this.valor).locale('es').format('DD [de] MMMM [del] YYYY');
        }}
    }
</script>
