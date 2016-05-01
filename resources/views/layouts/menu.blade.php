


<li class="{{ Request::is('documentos*') ? 'active' : '' }}">
    <a href="{!! route('documentos.index') !!}">Documentos</a>
</li>

<li class="{{ Request::is('bancos*') ? 'active' : '' }}">
    <a href="{!! route('bancos.index') !!}">bancos</a>
</li>

<li class="{{ Request::is('experiencias*') ? 'active' : '' }}">
    <a href="{!! route('experiencias.index') !!}">experiencias</a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}">categorias</a>
</li>

<li class="{{ Request::is('tblPaises*') ? 'active' : '' }}">
    <a href="{!! route('tblPaises.index') !!}">TblPaises</a>
</li>

