<h1>Panel de Pagos</h1>
<hr>

<section class="container-m">

  <form action="index.php?page=mnt.intentospagos.pago&mode={{mode}}&id={{id}}" method="post" >

        <fieldset class="row flex-center align-center">
            <label for="cliente" class="col-5" >Cliente</label>
            <input type="text" class="col-7" id="cliente" name="cliente" value="{{cliente}}" placeholder="Nombre Cliente">
        </fieldset>


        <fieldset class="row flex-center align-center" >
            <label for="monto" class="col-5" >Monto</label>
            <input type="number" class="col-7" id="monto" name="monto" value="{{monto}}" placeholder="Ingrese monto ejm: 4000">
        </fieldset>
        
        <fieldset class="row flex-center align-center" >
            <label for="fechaVencimiento" class="col-5" >Fecha Vencimiento</label>
            <input type="date" class="col-7" id="fechaVencimiento" value="{{fechaVencimiento}}" name="fechaVencimiento">
        </fieldset>

        <fieldset class="row flex-center align-center">
            <label for="estado" class="col-5" >Estado</label>
            <select class="col-7" name="estado" id="estado">
            {{foreach _estadoPagoOptions}}
                <option value="{{value}}" {{selected}}>{{text}}</option>
            {{endfor _estadoPagoOptions}}
        </fieldset>

        <fieldset class="row flex-center align-center">
            <input name="confirmar" id="confirmar" class="btn primary" type="submit" value="Confirmar">
            <input name="cancelar" id="cancelar"  class="btn secondary" type="submit" value="Cancelar">
        </fieldset>

    </form>

</section>

<script>

    document.addEventListener('DOMContentLoaded' , e => {

        const btnCancelar = document.querySelector('#cancelar');

        btnCancelar.addEventListener('click' , e => {
            e.preventDefault();
            
            location.assign('index.php?page=mnt_intentospagos_intentospagos');
        })
    })

</script>