<template>
<div>

  <div @click="likesa" class="heart" :class="{ 'is-active' : this.likes }"></div>
<div class="text-center">{{totale}} Le gusto</div>
</div>
</template>

<script>
export default {
    props:['like','total','likes'],
data() {
  return {
  suma:this.total  
  }
},
methods: {
  likesa(){
    
    axios.get(`/pagina/public/like/${this.like}`).then((result)=>{
       if (result.data.attached.length>0){
         this.suma++
       }
       else{
         this.suma--
       }
    }).catch((result)=>{
      if(result.response.status='401'){
        window.location='/pagina/public/login';
      }
    })
  }
},
computed:{ totale(){
return this.suma
}
}
}


</script>