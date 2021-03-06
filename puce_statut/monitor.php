<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2014                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined("_ECRIRE_INC_VERSION")) return;

function puce_statut_monitor_dist($id, $statut, $ajax='', $menu_rapide=_ACTIVER_PUCE_RAPIDE){

    $alert = sql_fetsel("alert", "spip_monitor", "id_syndic=" . intval($id));

    // cas particulier des sites en panne de ping :
    // on envoi une puce speciale, et pas de menu de changement rapide
    if ($alert) {
        if($alert['alert'] >= 5) {
                $puce = 'puce-verte-anim.gif';
                $title = _T('monitor:info_site_noping');
        } else {
                $puce = 'puce-publier-8.gif';
                $title = _T('monitor:info_site_ping');
        }
        return http_img_pack($puce, $title);
    }   
    else
        return puce_statut_changement_rapide($id,$statut,$type,$ajax,$menu_rapide);
}


?>