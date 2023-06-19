<?php 
    function navBar ($texto, $login, $home, $comunidade, $jogos) {
        return "
        <aside>
            <nav>
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

        <h1 id='texto'><a href='#up'>$texto</a></h1>
        
        <div>
            <a class='iconesNavBar'  href=$login>
                <i class='icones material-symbols-outlined'>person</i>
            </a>
        </div>
    </aside>
    ";
    }