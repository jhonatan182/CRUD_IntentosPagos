<h1>{{modeDsc}}</h1>
<hr>

<section class="container-m">

  <form action="index.php?page=mnt.categorias.categoria&mode={{mode}}&catid={{catid}}" method="post" >
        {{ifnot isInsert}}
            <fieldset class="row flex-center align-center">
                <label for="catid" class="col-5" >Codigo</label>
                <input type="text" class="col-7" id="catid" name="catid"  value="{{catid}}" placeholder="">
            </fieldset>
        {{endifnot isInsert}}

        <fieldset class="row flex-center align-center" >
            <label for="catnom" class="col-5" >Categoria</label>
            <input type="text" class="col-7" id="catnom" name="catnom" value="{{catnom}}"  placeholder="">
        </fieldset>

        <fieldset class="row flex-center align-center">
            <label for="catest" class="col-5" >Estado</label>
            <select class="col-7" name="catest" id="catest">
            {{foreach catestOptions}}
                <option value="{{value}}" {{selected}}>{{text}}</option>
            {{endfor catestOptions}}
            </select>
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
            
            location.assign('index.php?page=mnt_categorias_categorias');
        })
    })

</script>