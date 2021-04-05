<div class="form-group row">
    <label class="col-md-3 form-control-label" for="text-input">Producto:</label>
    <div class="col-md-9">
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto"
        required pattern="^[a-zA-Z_áéíóú\S]{0,30}$">
        
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="des">Codigo:</label>
    <div class="col-md-9">
    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese el codigo">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="des">Precio de Venta:</label>
    <div class="col-md-9">
    <input type="text" name="precioventa" id="precioventa" class="form-control" placeholder="Ingrese el precio de venta">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="des">Stock:</label>
    <div class="col-md-9">
    <input type="text" name="stock" id="stock" class="form-control" placeholder="Ingrese la cantidad">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 form-control-label" for="des">Categoria:</label>
    <div class="col-md-9">
    <select class="form-control" name="categoria" id="categoria">
        @foreach($categorias as $ocate)
        <option value="{{$ocate->IdCategoria}}">{{$ocate->Nombre}}</option>
        @endforeach
    </select>

    </div>
</div>


<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
    
</div>