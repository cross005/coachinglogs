Issues:
(done)1. yung image sa http://localhost/coaching-system-v1.6/cms/view.php
malaki parin

(solved)2. may bug ang http://localhost/coaching-system-v1.6/cms/view.php kasi yung signature ay inaccept na ni agent, at inaccept na rin ni os, pero nung na i-view ni os (pumunta sya sa http://localhost/coaching-system-v1.6/cms/view.php), walang signature

(on proccess, reference ID, emp number)3. Yung sa view records n mkkita sa http://localhost/coaching-system-v1.6/user/index.php ay kulang kasi ang nakalagay lang ay date created, created by OS at view information so tatlo lang. Dapat 7 at ito ay ang reference/ID number, employee number, agent name, os name, om name, date/time stamp at view information

(solved)4. bok itong http://localhost/coaching-system-v1.6/user/view.php napansin ko originally na signature lang ni agent yung nakalagay. so minodify ko, dinagdagan ko ng signature ni os at om kasi me rights naman syang makita kung sinu-sino yung mga signatories. since view record ito ni agent dapat pag pumirma na si os at om makikita din nya. so yung signature dito ni os at om ay static parin, kelangan dynamic.

(solved)5. Dito naman sa http://localhost/coaching-system-v1.6/cms/coaching/index.php idinagdag ko rin yung tatlong bida natin, si agent, os, at om sa tatlong signature fields. kasi kahit iccreate pa lang ni os yung coaching log, alam na dapat ng code kung sino yung gagawan nya ng coaching log (syempre wala pang signaure pero yung mga names nasa respective fields na). kasi diba sa dropdown ng mga listahan ng mga agents dun malalaman kung kaninong agent ang gagawan ni os ng coaching log. dapat itong mga signature fields sa ibaba dynamic lahat 'to, kumporme sa kung kanino under si agent na os at kaninong om naman under si os. May matindi pa akong logic na naiisip dito pag nag-dig down deep tayo kaya be prepared. di ko muna sasabihin pero yung flow na-vivisualize ko na. sa ngayon yun muna: dapat fully-associated ang mga users o meron silang pagkakaugnay sa isat-isa. so dito, inistatic ko muna parang placeholder lang muna. Pero sa ibang file like http://localhost/coaching-system-v1.6/user/om/view.php nagawa mo naman na, kelangan lang tlga uniform sa lahat.

(Done)6. scenario: gumawa ng coaching log si elisa para sa agent nya na si vennel. tapos naglog out si elisa para makapaglogin si vennel at ma-confirm yung password nya. nagconfirm si vennel. nag-login ulet si elisa at nakita nga nya na nakashow na yung signature ni vennel. nag-acknowledge na rin si elisa at nilagay nya ang sariling password which is inaccept naman ng system. nag logout si elisa para si jomarie naman ang maglogin at mag-acknowledge. Nung pagkalogin ni jomarie nagtaka sya? bakit kay vennel lang na signature ang nagshow bakit wala yung signature ni elisa e, naka-acknowledge naman na si elisa? Bok, ikaw makakasagot nyan hahaha. Observation: yung flow na to OK naman sa agent na si mento at os nya na si jefferson santiago at om na si joms, pero hindi kay wilson kahit parehas naman sila ni mentos na under sa iisang os, dahil under yung dalawang agents sa iisang team (team jeff) same functionality dapat sila.

(Done)7. Yung mga signature fields dito static pa, kelangan dynamic: http://localhost/coaching-system-v1.6/user/view.php

1. reference/ID number--not ok
2. employee number--ok
3. agent--ok
4. os--ok
5. om--ok
6. date created--ok
7. time stamp--ok
8. Info Link--ok
9. Status--ok


08242015v1.12 Changes

* updated fixed table with ellipsis on overflow
* title bars contents
* validation:required on textareas

08252015v1.13 fixes
*new gradient menu header
*minor fixes
*nabago ko na yung timezone sa PC mo, paki-restart nalang yung xampp. hehe


(Done)8. Paki-solve bok, kapag nag-bback ka sa ibang webpages, nag-uundefined. Tanggalin na lang yung not_authorized.php kasi dapat, sa main index page na mapupunta yung user pag nag-back. Pakidamay narin yung lahat ng pages kasi yung nai-edit mo neto iilan lang kaya nag-oObject not found which is masakit sa mata :)

(done, only reference# left)12. Yung Status (OK,Pending), Reference# at Employee# dun sa:
http://localhost/coaching-system-v1.11/user/index.php
http://localhost/coaching-system-v1.11/cms/index.php
http://localhost/coaching-system-v1.11/user/om/index.php
--ay hindi parin nagpapakita, kelangan na 'to maging OK

(done)13. Yung button na "Accept", once nakapag-accept na si agent,os,om dapat mawawala na sya dun.

(done! )14. Yung sa 'Action Plan: Agent's Commitment' kelangan nai-edit ni agent kasi sya yung mag-fifillup nun. Kaya dapat filtered talaga yung mga textareas ha kasi kasama si agent sa mag-iinput dun. Dapat wala na rin yung single quote issue kasi hindi mapupunta sa database.

(Done)15. dun sa dropdown box ng create coaching log kung saan pipili si OS ng agent kapag 'Select Agent' yung pinili ni OS dapat hindi ma-ccreate yung coaching log or mag-aalert kasi invalid yun.

(done in cms/coahing/index.php)16. Single quote issue: hindi na-ssave sa database yung record pag meron nito sa textarea.


features

-Notification for agent if OS and OM confirm their signature

