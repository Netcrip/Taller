<?php
if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {
    include('../config/config.php');

    $funcion = $_GET['funcion'];
    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch($funcion) {
        
        case 'setordendeservicio': 
            try {
                $tid=$_GET['tid'];
                $dominio=$_GET['dominio'];
                $fecha=$_GET['fecha'];;
                $horario=$_GET['horario'];
                $obs=$_GET['obs'];
                $select=$_GET['select'];
                $db   = getDB();
                $stmt = $db->prepare("insert into ordenentaller (tid,dominio,fecha,horario) values (:tid,:dominio,:fecha,:horario);");
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->bindParam("dominio", $dominio, PDO::PARAM_STR);
                $stmt->bindParam("fecha", $fecha, PDO::PARAM_STR);
                $stmt->bindParam("horario", $horario, PDO::PARAM_STR);
                $stmt->execute();
                $temp = $db->lastInsertId();
                foreach($select as $cod){
                    $stmt2 = $db->prepare("insert into `ordenentaller-detalle` (otid,codserv,observacion) values (:otid,:codserv,:observacion);");
                    $stmt2->bindParam("otid", $temp, PDO::PARAM_STR);
                    $stmt2->bindParam("codserv", $cod, PDO::PARAM_STR);
                    $stmt2->bindParam("observacion", $obs, PDO::PARAM_STR);
                    if ($stmt2->execute()) { 
                        // it worked
                        $insertid="si";
                    } 
                }
                if ($insertid=="si")
                        echo true;
                else
                    echo false;
                $stmt2="";

            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
                //$stmt=null;
                //$db=null;
            }
        break;
        case 'generarsolicitud':
            try {
                $vid=$_GET['vid'];
                $tid=$_GET['tid'];
                $obs=$_GET['obs'];
                $fecha=$_GET['fecha'];
                $select=$_GET['select'];
                $db   = getDB();
                $stmt = $db->prepare("insert into solicitud (vid,tid,fecha,observacion) values (:vid,:tid,:fecha,:obs);");
                $stmt->bindParam("vid", $vid, PDO::PARAM_STR);
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->bindParam("fecha", $fecha, PDO::PARAM_STR);
                $stmt->bindParam("obs", $obs, PDO::PARAM_STR);
                $stmt->execute();
                $temp = $db->lastInsertId();
                    foreach($select as $cod){
                        $stmt2 = $db->prepare("insert into `solicitud-detalle` (sid,codserv) values (:sid,:codserv)");
                        $stmt2->bindParam("sid", $temp, PDO::PARAM_STR);
                        $stmt2->bindParam("codserv", $cod, PDO::PARAM_STR);
                        if ($stmt2->execute()) { 
                            // it worked
                            $insertid="si";
                        } 
                    }
                if($insertid=="si"){
                    echo true;
                }
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'cargareditarorden':
            try {
                $buscar= $_GET['buscar'];
                $db   = getDB();
                $stmt = $db->prepare($buscar);
            // $stmt->bindParam("buscar", $buscar, PDO::PARAM_STR);
                $stmt->execute();
                echo json_encode($stmt->fetchAll());
                //$stmt=null;
                //$db=null;
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
                //$stmt=null;
                //$db=null;
            }
        break;
        case 'gettablaservicio':
            try {
                $tid=$_GET['tid'];
                $db   = getDB();
                $stmt = $db->prepare("select solicitud.sid, dominio, solicitud.observacion,count(`solicitud-detalle`.codserv) as nombre from solicitud 
                inner join `solicitud-detalle` on solicitud.sid =`solicitud-detalle`.sid 
                inner join vehiculos on vehiculos.vid = solicitud.vid
                inner join servicios on servicios.codserv = `solicitud-detalle`.codserv
                where solicitud.estado!=0 and solicitud.tid=:tid
                group by vehiculos.dominio");
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->execute();
                echo json_encode($stmt->fetchAll());
                //$stmt=null;
                //$db=null;
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
               // $stmt=null;
                //$db=null;
            }

        break;
        case 'getsesion':
            echo  $_SESSION['uid'];
            //$stmt=null;
            //$db=null;

        break;
        case 'gettablaordenes':
            try {
                $db   = getDB();
                $fecha=$_GET['fecha'];
                $tid=$_GET['tid'];
                $stmt = $db->prepare("select 1 as tipo, ordenes.oid, ordenes.vid, ordenes.tid, vehiculos.dominio, ordenes.horario, ordenes.estado , count(`ordenes-detalle`.codser) as nombre from  ordenes 
                inner join `ordenes-detalle` on `ordenes-detalle`.oid = ordenes.oid  
                inner join servicios on `ordenes-detalle`.codser = servicios.codserv
                inner join vehiculos on vehiculos.vid = ordenes.vid
                where ordenes.estado!=0  and `ordenes-detalle`.estado!=0 and  fecha=:fecha and tid=:tid
                group by dominio
                union 
                select 0 as tipo, ordenentaller.otid as oid, null as vid, null as tid,  ordenentaller.dominio, ordenentaller.horario, ordenentaller.estado , count(`ordenentaller-detalle`.codserv) as nombre from  ordenentaller 
                inner join `ordenentaller-detalle` on `ordenentaller-detalle`.otid = ordenentaller.otid  
                inner join servicios on `ordenentaller-detalle`.codserv = servicios.codserv
                where ordenentaller.estado!=0  and `ordenentaller-detalle`.estado!=0  and  fecha=:fecha  and tid=:tid
                group by dominio");
                $stmt->bindParam("fecha", $fecha, PDO::PARAM_STR);
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->execute();
                echo json_encode($stmt->fetchAll());
                //$stmt=null;
                //$db=null;
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
                //$stmt=null;
                //$db=null;
            }

        break;
        case 'modificarturnoasignado':
            try {
                $oid=$_GET['oid'];
                $dominio=$_GET['dominio'];
                $fecha=$_GET['fecha'];
                $horario=$_GET['horario'];
                $obs=$_GET['obs'];
                $select=$_GET['select'];
                $t=$_GET['t'];
                $db   = getDB();
                if($t=='true'){
                    $stmt3 = $db->prepare("update ordenes set fecha=:fecha,horario=:horario where oid=:oid");
                    $stmt3->bindParam("oid", $oid, PDO::PARAM_STR);
                    $stmt3->bindParam("fecha", $fecha, PDO::PARAM_STR);
                    $stmt3->bindParam("horario", $horario, PDO::PARAM_STR);
                    $stmt3->execute();
                    $stmt = $db->prepare("delete from `ordenes-detalle` where oid=:oid");
                    $stmt->bindParam("oid", $oid, PDO::PARAM_STR);
                    $stmt->execute();
                    foreach($select as $cod){
                        $stmt2 = $db->prepare("insert into `ordenes-detalle` (oid,codser,observacion) values (:oid,:codserv,:observacion)");
                        $stmt2->bindParam("oid", $oid, PDO::PARAM_STR);
                        $stmt2->bindParam("codserv", $cod, PDO::PARAM_STR);
                        $stmt2->bindParam("observacion", $obs, PDO::PARAM_STR);
                        if ($stmt2->execute()) { 
                            // it worked
                            $insertid="si";
                        } 
                    }
                }
                else{
                    $stmt5 = $db->prepare("update ordenentaller set fecha=:fecha,horario=:horario where otid=:otid");
                    $stmt5->bindParam("otid", $oid, PDO::PARAM_STR);
                    $stmt5->bindParam("fecha", $fecha, PDO::PARAM_STR);
                    $stmt5->bindParam("horario", $horario, PDO::PARAM_STR);
                    $stmt5->execute();
                    $stmt4 = $db->prepare("delete from `ordenentaller-detalle` where otid=:otid");
                    $stmt4->bindParam("otid", $oid, PDO::PARAM_STR);
                    $stmt4->execute(); 
                    foreach($select as $cod){
                        $stmt6 = $db->prepare("insert into `ordenentaller-detalle` (otid,codserv,observacion) values (:otid,:codserv,:observacion)");
                        $stmt6->bindParam("otid", $oid, PDO::PARAM_STR);
                        $stmt6->bindParam("codserv", $cod, PDO::PARAM_STR);
                        $stmt6->bindParam("observacion", $obs, PDO::PARAM_STR);
                        if ($stmt6->execute()) { 
                            // it worked
                            $insertid="si";
                        } 
                    }
                }
                
                if ($insertid=="si")
                        echo true;
                else
                    echo false;
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
                //$stmt=null;
                //$db=null;
            }
        break;
        case 'eliminarorden':
            try {
                $t=$_GET['t'];
                $oid=$_GET['oid'];
                $db   = getDB();
                if($t=='true'){
                    $stmt =$db->prepare("update ordenes set estado=0 where oid=:oid");
                    $stmt->bindParam("oid", $oid, PDO::PARAM_STR);
                    if ($stmt->execute()) { 
                        // it worked
                        $insertid="si";
                    } 
                }
                else{
                    $stmt =$db->prepare("update ordenentaller set estado=0 where otid=:oid");
                    $stmt->bindParam("oid", $oid, PDO::PARAM_STR);
                    if ($stmt->execute()) { 
                        // it worked
                        $insertid="si";
                    } 

                }
                
                if ($insertid=="si")
                            echo true;
                    else
                        echo false;    
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
                //$stmt=null;
                //$db=null;
            }
        break;
        case 'cargarordenservicio':
            try {
                $sid=$_GET['sid'];
                $db   = getDB();
                $stmt = $db->prepare("select solicitud.sid, vehiculos.vid, solicitud.tid, dominio,`solicitud-detalle`.codserv, solicitud.observacion from solicitud 
                inner join `solicitud-detalle` on solicitud.sid =`solicitud-detalle`.sid 
                inner join vehiculos on vehiculos.vid = solicitud.vid
                inner join servicios on servicios.codserv = `solicitud-detalle`.codserv
                where solicitud.estado!=0 and solicitud.sid=:sid");
                $stmt->bindParam("sid", $sid, PDO::PARAM_STR);
                $stmt->execute();
                echo json_encode($stmt->fetchAll());
                //$stmt=null;
                //$db=null;
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
                // $stmt=null;
                //$db=null;
            }
        break;
        case 'asignarturno':
            try {
                $sid=$_GET['sid'];
                $vid=$_GET['vid'];
                $tid=$_GET['tid'];
                $fecha=$_GET['fecha'];
                $hora=$_GET['hora'];
                $select=$_GET['select'];
                $obs=$_GET['observacion'];
                $db   = getDB();
                $stmt = $db->prepare("insert into ordenes (vid,tid,fecha,horario) values (:vid,:tid,:fecha,:horario);");
                $stmt->bindParam("vid", $tid, PDO::PARAM_STR);
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->bindParam("fecha", $fecha, PDO::PARAM_STR);
                $stmt->bindParam("horario", $hora, PDO::PARAM_STR);
                $stmt->execute();
                $temp = $db->lastInsertId();
                foreach($select as $cod){
                    $stmt2 = $db->prepare("insert into `ordenes-detalle` (oid,codser,observacion) values (:oid,:codser,:observacion);");
                    $stmt2->bindParam("oid", $temp, PDO::PARAM_STR);
                    $stmt2->bindParam("codser", $cod, PDO::PARAM_STR);
                    $stmt2->bindParam("observacion", $obs, PDO::PARAM_STR);
                    if ($stmt2->execute()) { 
                        // it worked
                        $insertid="si";
                    } 
                }
                if ($insertid=="si"){
                    $stmt3 = $db->prepare("update solicitud set estado=0 where sid=:sid");
                    $stmt3->bindParam("sid", $sid, PDO::PARAM_STR);
                    $stmt3->execute();
                    echo true;
                }
                   
                else
                    echo false;
            }   
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
            // $stmt=null;
                //$db=null;
            }
        break;    
        case 'anularsolicitud':
            try {
                $sid=$_GET['sid'];
                $db   = getDB();
                $stmt = $db->prepare("update solicitud set estado=0 where sid=:sid");
                $stmt->bindParam("sid", $sid, PDO::PARAM_STR);
                if ($stmt->execute()) { 
                    // it worked
                    $insertid="si";
                }
                if ($insertid=="si"){ 
                    echo true;
                } 
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break; 
        case 'modificarserviciotaller':
            try {
                $tid=$_GET['tid'];
                $select=$_GET['select'];
                $db   = getDB();
                $stmt = $db->prepare("delete from  `servicio-taller` where tid=:tid");
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->execute();
                foreach($select as $cod){
                    $stmt2 = $db->prepare("insert into `servicio-taller` (tid,codserv) values (:tid,:codserv)");
                    $stmt2->bindParam("tid", $tid, PDO::PARAM_STR);
                    $stmt2->bindParam("codserv", $cod, PDO::PARAM_STR);
                    if ($stmt2->execute()) { 
                        // it worked
                        $insertid="si";
                    } 
                }
            if ($insertid=="si")
                echo true;
            else
                echo false;
            }
            catch (PDOException $e) {
                echo '{"error":{"text":' . $e->getMessage() . '}}';
             }
        break;
        case 'serviciostaller':
            try {
                $tid=$_GET['tid'];
                $db   = getDB();
                $stmt = $db->prepare("select `servicio-taller`.codserv, talleres.nombre as taller, usuarios.nombre from `servicio-taller` 
                inner join `taller-usuario`  on `taller-usuario`.tid = `servicio-taller`.tid
                inner join usuarios on usuarios.uid =`taller-usuario`.uid
                inner join talleres on `servicio-taller`.tid=talleres.tid
                where `servicio-taller`.tid=:tid and `servicio-taller`.estado!=0");
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'tengotaller':
            try {
                $uid=$_SESSION['uid'];
                $db   = getDB();
                $stmt = $db->prepare("select `taller-usuario`.tid from `taller-usuario`
                inner join talleres on talleres.tid=`taller-usuario`.tid 
                where `taller-usuario`.uid=:uid");
                $stmt->bindParam("uid", $uid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'cumplimentarorden':
            try {
                $t=$_GET['tipo'];
                $oid=$_GET['oid'];
                $vid=$_GET['vid'];
                $fecha=$_GET['fecha'];
                $km=$_GET['km'];
                $db   = getDB();
                if($t=='true')               {
                    $stmt = $db->prepare("update ordenes set estado=2 where oid=:oid");
                    $stmt->bindParam("oid", $oid, PDO::PARAM_STR);
                    $stmt->execute();    
                    $stmt2 = $db->prepare("insert into kilometros (vid,fecha,km,oid) values (:vid,:fecha,:km,:oid)");
                    $stmt2->bindParam("vid", $vid, PDO::PARAM_STR);
                    $stmt2->bindParam("fecha", $fecha, PDO::PARAM_STR);
                    $stmt2->bindParam("km", $km, PDO::PARAM_STR);
                    $stmt2->bindParam("oid", $oid, PDO::PARAM_STR);
                    if ($stmt2->execute()) { 
                        // it worked
                        $insertid="si";
                    } 

                }
                else
                {
                    $stmt3 = $db->prepare("update ordenentaller set estado=2 where otid=:otid");
                    $stmt3->bindParam("otid", $oid, PDO::PARAM_STR);
                    if ($stmt3->execute()) { 
                        // it worked
                        $insertid="si";
                    } 
                }
                              
                if ($insertid=="si")
                    echo true;
                else
                    echo false;  
        
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'servicioauto':
            try {
                $vid=$_GET['vid'];
                $db   = getDB();
                $stmt = $db->prepare("select ordenes.oid, talleres.nombre as taller, ordenes.fecha, count(`ordenes-detalle`.codser) as servicio, kilometros.km from ordenes
                inner join `ordenes-detalle` on ordenes.oid=`ordenes-detalle`.oid
                inner join  servicios on servicios.codserv =`ordenes-detalle`.codser
                inner join kilometros on kilometros.oid=ordenes.oid
                inner join talleres on talleres.tid = ordenes.tid
                where ordenes.vid=:vid");
                $stmt->bindParam("vid", $vid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'getkmydomautocliente':
            try {
                $vid=$_GET['vid'];
                $db   = getDB();
                $stmt = $db->prepare("select IFNULL(MAX(kilometros.km), 'No hay registro') as km, vehiculos.dominio from kilometros
                inner join vehiculos on kilometros.vid =vehiculos.vid
                where kilometros.vid=:vid");
                $stmt->bindParam("vid", $vid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked      
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'getproximoserviciocliente':
            try {
                $vid=$_GET['vid'];
                $db   = getDB();
                $stmt = $db->prepare("select min(ordenes.oid) as oid, vehiculos.dominio, ordenes.fecha as servicio from vehiculos
                left join ordenes on vehiculos.vid =ordenes.vid
                where vehiculos.estado=1 and  vehiculos.vid=:vid and DATE(ordenes.fecha)> curdate()");
                $stmt->bindParam("vid", $vid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked      
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'proximoturnoscliente':
            try {
                $uid=$_SESSION['uid'];
                $db   = getDB();
                $stmt = $db->prepare("select ordenes.oid, dominio, fecha , talleres.nombre, count(`ordenes-detalle`.codser ) as servicios from ordenes
                inner join `ordenes-detalle` on `ordenes-detalle`.oid=ordenes.oid
                inner join talleres on talleres.tid = ordenes.tid
                inner join vehiculos on ordenes.vid = vehiculos.vid
                inner join usuarios on usuarios.uid = vehiculos.uid
                where usuarios.uid=:uid and ordenes.estado=1
                group by oid");
                $stmt->bindParam("uid", $uid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'selectvehiculos':
            try {
                $uid=$_SESSION['uid'];
                $db   = getDB();
                $stmt = $db->prepare("select vid, dominio from vehiculos where estado!=0 and uid=:uid");
                $stmt->bindParam("uid", $uid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'serviciodeltaller':
            try {
                $tid=$_GET['tid'];
                $db   = getDB();
                $stmt = $db->prepare("select `servicio-taller`.codserv, servicios.nombre from `servicio-taller`
                inner join servicios on servicios.codserv= `servicio-taller`.codserv 
                where tid=:tid");
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'listadetaller':
            try {
                $db   = getDB();
                $stmt = $db->prepare("select tid, nombre from talleres where estado!=0");
                $stmt->bindParam("uid", $uid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'obtenerdatostaller':
            try {
                $tid=$_GET['tid'];
                $db   = getDB();
                $stmt = $db->prepare("select nombre,telefono, email,calle,nro, localidad from talleres 
                inner join cp on talleres.codloca = cp.codlocalidad where tid=:tid");
                $stmt->bindParam("tid", $tid, PDO::PARAM_STR);
                $stmt->execute();
                    // it worked
                
                echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
            
        break;
        case 'solicitudesactivas':
            try {
            $uid=$_SESSION['uid'];
            $db   = getDB();
            $stmt = $db->prepare("select solicitud.sid, vehiculos.dominio, talleres.nombre, fecha, count(`solicitud-detalle`.codserv) as servicios from solicitud
            inner join vehiculos on vehiculos.vid = solicitud.vid
            inner join `solicitud-detalle` on `solicitud-detalle`.sid =solicitud.sid
            inner join talleres on solicitud.tid = talleres.tid
            inner join usuarios on usuarios.uid = vehiculos.uid where usuarios.uid=:uid and solicitud.estado!=0
            group by sid");
            $stmt->bindParam("uid", $uid, PDO::PARAM_STR);
            $stmt->execute();
                // it worked
            
            echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'selectmarca':
            try {
            $db   = getDB();
            $stmt = $db->prepare("select codmarca, nombre from marca where estado!=0");
            $stmt->execute();
                // it worked
            
            echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'selecttipovehiculo':
            try {
            $db   = getDB();
            $stmt = $db->prepare("select codtipo, tipo from tipovehiculo where estado!=0");
            $stmt->execute();
                // it worked
            
            echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'selectmodelo':
            try {
            $tipo=$_GET['codtipo'];
            $codmarca=$_GET['codmarca'];
            $db   = getDB();
            $stmt = $db->prepare("select codmodelo, nombremodelo from modelo  where codmarca=:codmarca and tipo=:tipo");
            $stmt->bindParam("codmarca", $codmarca, PDO::PARAM_STR);
            $stmt->bindParam("tipo", $tipo, PDO::PARAM_STR);
            $stmt->execute();
                // it worked
            
            echo json_encode($stmt->fetchAll());
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
        case 'altaauto':
            try {
            $codmodelo=$_GET['codmodelo'];
            $dominio=$_GET['dominio'];
            $ano=$_GET['ano'];
            $motor=$_GET['motor'];
            $chasis=$_GET['chasis'];
            $uid=$_SESSION['uid'];
            $db   = getDB();
            $stmt = $db->prepare("insert into vehiculos (uid,codmodelo,dominio,año,chasis,motor) values (:uid,:codmodelo,:dominio,:ano,:chasis,:motor)");
            $stmt->bindParam("codmodelo", $codmodelo, PDO::PARAM_STR);
            $stmt->bindParam("dominio", $dominio, PDO::PARAM_STR);
            $stmt->bindParam("ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam("motor", $motor, PDO::PARAM_STR);
            $stmt->bindParam("chasis", $chasis, PDO::PARAM_STR);
            $stmt->bindParam("uid", $uid, PDO::PARAM_STR);
            if($stmt->execute())            
                 echo true;
                // it worke
            }
            catch (PDOException $e) {
                    echo '{"error":{"text":' . $e->getMessage() . '}}';
            }
        break;
    }
}
?>
