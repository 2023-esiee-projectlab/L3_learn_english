<?php 
	include('include/php_start.php');
    include('include/head.php');
    ?>
	<body>
        <!-- Container -->
		<div class="container container-client">
            <?php
            	include('include/header.php');
                include('include/alertes.php');
            	include('include/account_update.php');
                include('include/add_lecon.php');
                include('include/update_lecon.php');
            ?>

            <!-- LeconsListes -->
            <div class="row">
                <div id="list_company" class="col-md-12 content-table">
                    <h2>Liste des Lecons</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date Création</th>
                                <th scope="col">Date Modification</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Link</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Grabe user informations
                                $sql = 'SELECT * FROM lecons';
                                $result_sql = $host->query($sql);
                                while ( $row = $result_sql->fetch() ){
                                    $leconsId = $row['id'];
                                    $leconsTitle = $row['title'];
                                    $leconsDescription = $row['description'];
                                    if($row['theme']!=null){
                                        if($row['theme']=='Halloween'){ $typeTheme = 'primary'; }elseif($row['theme']=='Noël'){ $typeTheme = 'info'; }else{ $typeTheme = 'secondary'; }
                                        $leconsTheme = '<span class="badge rounded-pill bg-'.$typeTheme.'" style="color:white;">'.$row['theme'].'</span>';
                                    }else{ $leconsTheme = '<span class="badge rounded-pill bg-warning" style="color:white;">Aucun thème</span>'; }
                                    $leconsDateCreate = $row['date_create'];
                                    $leconsDateUpdate = $row['date_update'];
                                    if($row['statut']==1){ $statut = "✅"; }else{ $statut = "❌"; }
                                    if($row['statut']==1){
                                        $link = 'http://'.$_SERVER['HTTP_HOST'].'/lecon.php?lecon_id='.$leconsId;
                                        $linkLecon = '<a href="'.$link.'" target="_blank">'.$link.'</a>';
                                    }else{ $linkLecon = '<i style="color:red;">Leçon Fermée</i>'; }
                                    //-
                                    echo '
                                        <tr>
                                            <td>'.$leconsId.'</td>
                                            <td>'.$leconsTitle.'</td>
                                            <td>'.$leconsDescription.'</td>
                                            <td>'.$leconsTheme.'</td>
                                            <td>'.$leconsDateCreate.'</td>
                                            <td>'.$leconsDateUpdate.'</td>
                                            <td>'.$statut.'</td>
                                            <td>'.$linkLecon.'</td>
                                            <td><a href="post.php?id='.$leconsId.'&update=true">🛠</a></td>
                                            <td><a href="post.php?id='.$leconsId.'&delete=true">🗑</a></td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ./LeconsListes -->

            <!-- Basdepage -->
            <div class="row">
                <div class="col-12 btn_haut_de_page">
                    <a href="#title">Haut de Page</a>
                </div>
            </div>
            <!-- ./Basdepage -->

            <?php include('include/footer.php'); ?>

        </div>
        <!-- ./Container -->
        
	<body>
    <?php
    include('include/javascript.php');
    include('include/php_end.php');
?>