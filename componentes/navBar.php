<?php 
    function navBar ($texto, $login, $home, $comunidade, $jogos) {
        return "
        <aside>
            <nav>
                <a href=$login>
                    <img id='imgNavBar' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh-Bn7-KSnRyMXgvNe72nE1qh9kTxrBHM2cQ&usqp=CAU' alt='Perfil'>
                </a>

                <a class='iconesNavBar' href=$home>
                    <i class='icones material-symbols-outlined'>home</i>
                </a>

                <a class='iconesNavBar' href=$comunidade>
                    <i class='icones material-symbols-outlined'>groups</i>
                </a>

                <a class='iconesNavBar' href=$jogos>
                    <i class='icones material-symbols-outlined'>sports_esports</i>
                </a>
            </nav>        

        <h1 id='texto'>$texto</h1>
        
        <div>
            <a class='iconesNavBar'  href=$login>
                <i class='icones material-symbols-outlined'>person</i>
            </a>
        </div>
    </aside>
    ";
    }