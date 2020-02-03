<li class="{{ Request::is('familias*') ? 'active' : '' }}">
    <a href="{{ route('familias.index') }}"><i class="fa fa-edit"></i><span>Familias</span></a>
</li>

<li class="{{ Request::is('pessoas*') ? 'active' : '' }}">
    <a href="{{ route('pessoas.index') }}"><i class="fa fa-edit"></i><span>Pessoas</span></a>
</li>

<li class="{{ Request::is('programaSocials*') ? 'active' : '' }}">
    <a href="{{ route('programaSocials.index') }}"><i class="fa fa-edit"></i><span>Programa  Socials</span></a>
</li>

