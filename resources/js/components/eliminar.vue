<template>
<div>
   <span class="btn btn-danger w-50 mt-1" @click="borrar()">Eliminar</span>
</div>
</template>

<script>

    export default {
        props:['di'],
        methods:{
            borrar(){
this.$swal.fire({
  title: 'Estas seguro de eliminar?',
  text: "Si lo borras no lo podras volver a recuperar!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, borrar!',
  cancelmButtonText:'No'
}).then((result) => {
  if (result.value) {
      const params={
          id:this.di
      }
    axios.post(`/pagina/public/receta/${this.di}`,{_method:'delete'}).then((result)=>{
        
        window.location='/pagina/public/recetas';
    })
    this.$swal.fire({
      title:'Receta eliminida',
      text:'Se elimino la receta',
      icon:'success'
    })
  }
})
            }
        }
        
        }
    
</script>
