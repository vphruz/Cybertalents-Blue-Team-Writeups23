
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Terminal.php</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://cdn.rawgit.com/rastikerdar/vazir-code-font/v1.1.2/dist/font-face.css" rel="stylesheet" type="text/css" />
    <style>
      :root{
          --background-url: url(https://images.unsplash.com/photo-1485470733090-0aae1788d5af?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1920);
          --font: 'Vazir Code', 'Vazir Code Hack';
          --font-size: 16px;
          --primary-color: #101010;
          --color-scheme-1: #55c2f9;
          --color-scheme-2: #ff5c57;
          --color-scheme-3: #5af68d;
          --scrollbar-color: #181818;
          --title-color: white;
          --blink-color: #979797;
          --blink: '|';
          --separator: '--->';
      }
      ::-webkit-scrollbar { width: 7px; }
      ::-webkit-scrollbar-track {  background: rgba(0,0,0,0); }
      ::-webkit-scrollbar-thumb { background: var(--scrollbar-color); border-radius: 5px; }
      *{ font-family: var(--font);}
      body{ background: var(--background-url) center no-repeat; background-size: cover; height: 100vh; width: 100vw; margin: 0; padding: 0; background-attachment: fixed; overflow: hidden; }
      a{ color: #29a9ff; }
      terminal{ display: block; width: 80vw;  height: 80vh; position: relative; margin: 7rem auto; background: inherit; border-radius: 10px; max-width: 70rem; overflow: hidden; }
      terminal::before,
      terminal::after{ content: ''; position: absolute; left: 0; top: 0; height: 100%; width: 100%; border-radius: 10px; }
      terminal::before{ background: inherit; filter: blur(.5rem); }
      terminal::after{ background: var(--primary-color); opacity: .75; }
      terminal header{ position: absolute; width: 100%; height: 45px; background: var(--primary-color); z-index: 1; border-radius: 10px 10px 0 0; user-select: none; }
      terminal header title{ display: block; position: absolute; left: 0; top: 0; width: 100%; height: 100%; text-align: center; color: var(--title-color); line-height: 45px; opacity: .8; z-index: -1; }
      terminal header buttons{ padding: 1rem; display: block; }
      terminal header buttons *{ display: inline-block; width: 15px; height: 15px; background: rgba(255,255,255,.1); border-radius: 50%; margin-right: 5px; cursor: pointer; }
      terminal header buttons close{ background: #fc615d; }
      terminal header buttons maximize{ background: #fdbc40; }
      terminal header buttons minimize{ background: #34c749; }
      terminal content{ position: absolute; left: 1.5%; top: 60px; width: 98%; height: 92%; z-index: 1; overflow-x: hidden; overflow-y: auto; color: #ececec; font-size: var(--font-size); }
      terminal content line{ display: block; }
      terminal content path{ color: var(--color-scheme-1); }
      terminal content sp{ color: var(--color-scheme-2); letter-spacing: -6px; margin-right: 5px;}
      terminal content sp::before{ content: var(--separator);}
      terminal content cm{ color: var(--color-scheme-3); }
      terminal content code{ display: inline; margin: 0; white-space: unset;}
      terminal content bl{ color: var(--blink-color); position: relative; top: -2px; }
      terminal content bl::before{ content: var(--blink); animation: blink 2s steps(1) infinite;}
      footer{ position: absolute; width: 100%; left: 0; bottom: 20px; color: white; text-align: center; font-size: 12px; }
      footer a{ text-decoration: none; color: #fdbc40; }
      @keyframes blink { 0% { opacity: 1} 50% { opacity: 0} 100% { opacity: 1} }
    </style>

    <script type="text/javascript">
        let commands_list = ["[","ab","acorn","addpart","apt","apt-cache","apt-cdrom","apt-config","apt-get","apt-key","apt-mark","arch","awk","b2sum","base32","base64","basename","basenc","bash","bashbug","c_rehash","captoinfo","cat","chage","chattr","chcon","checkgid","chfn","chgrp","chmod","choom","chown","chrt","chsh","cksum","clear","clear_console","cmp","comm","corelist","cp","cpan","cpan5.36-x86_64-linux-gnu","csplit","cut","dash","date","dd","deb-systemd-helper","deb-systemd-invoke","debconf","debconf-apt-progress","debconf-communicate","debconf-copydb","debconf-escape","debconf-set-selections","debconf-show","delpart","df","diff","diff3","dir","dircolors","dirname","dmesg","dnsdomainname","domainname","dpkg","dpkg-deb","dpkg-divert","dpkg-maintscript-helper","dpkg-query","dpkg-realpath","dpkg-split","dpkg-statoverride","dpkg-trigger","du","echo","editor","egrep","enc2xs","encguess","env","ex","expand","expiry","expr","factor","faillog","fallocate","false","fcgistarter","fgrep","fincore","find","findmnt","flock","fmt","fold","free","fuser","getconf","getent","getopt","git","git-receive-pack","git-shell","git-upload-archive","git-upload-pack","gpasswd","gpgv","grep","groups","gunzip","gzexe","gzip","h2ph","h2xs","hardlink","head","helpztags","hostid","hostname","htcacheclean","htdbm","htdigest","htpasswd","i386","iconv","id","infocmp","infotocap","install","instmodsh","ionice","ipcmk","ipcrm","ipcs","ischroot","join","js","json_pp","kill","killall","last","lastb","lastlog","lcf","ld.so","ldd","libnetcfg","link","linux32","linux64","ln","locale","localedef","logger","login","logname","logresolve","ls","lsattr","lsblk","lscpu","lsfd","lsipc","lsirq","lslocks","lslogins","lsmem","lsns","mawk","mcookie","md5sum","md5sum.textutils","mesg","mkdir","mkfifo","mknod","mktemp","more","mount","mountpoint","mv","namei","nawk","newgrp","nice","nisdomainname","nl","node","nodejs","nohup","nproc","nsenter","numfmt","od","openssl","pager","partx","passwd","paste","pathchk","pdb3","pdb3.11","peekfd","perl","perl5.36-x86_64-linux-gnu","perl5.36.0","perlbug","perldoc","perlivp","perlthanks","pgrep","phar","phar.phar","phar.phar8.2","phar8.2","phar8.2.phar","php","php8.2","piconv","pidof","pidwait","pinky","pkill","pl2pm","pldd","pmap","pod2html","pod2man","pod2text","pod2usage","podchecker","pr","printenv","printf","prlimit","prove","prtstat","ps","pslog","pstree","pstree.x11","ptar","ptardiff","ptargrep","ptx","pwd","pwdx","py3clean","py3compile","py3versions","pydoc3","pydoc3.11","pygettext3","pygettext3.11","python3","python3.11","rbash","readlink","realpath","rename.ul","renice","reset","resizepart","rev","rgrep","rm","rmdir","rotatelogs","run-parts","runcon","rview","rvim","savelog","scalar","script","scriptlive","scriptreplay","sdiff","sed","select-editor","sensible-browser","sensible-editor","sensible-pager","seq","setarch","setpriv","setsid","setterm","sg","sh","sha1sum","sha224sum","sha256sum","sha384sum","sha512sum","shasum","shred","shuf","skill","slabtop","sleep","snice","sort","splain","split","stat","stdbuf","streamzip","stty","su","sum","sync","tabs","tac","tail","tar","taskset","tee","tempfile","test","tic","timeout","tload","toe","top","touch","tput","tr","true","truncate","tset","tsort","tty","tzselect","ucf","ucfq","ucfr","uclampset","umount","uname","uncompress","unexpand","uniq","unlink","unshare","update-alternatives","uptime","users","utmpdump","vdir","vi","view","vim","vim.basic","vimdiff","vimtutor","vmstat","w","wall","watch","wc","wdctl","whereis","which","which.debianutils","who","whoami","wsdump","x86_64","xargs","xsubpp","xxd","yes","ypdomainname","zcat","zcmp","zdiff","zdump","zegrep","zfgrep","zforce","zgrep","zipdetails","zless","zmore","znew","hi","md5","developer"];
    </script>

    <script type="text/javascript">
        var path = '/challenge';
        var command = '';
        var command_history = [];
        var history_index = 0;
        var suggest = false;
        var blink_position = 0;
        var autocomplete_position = 0;
        var autocomplete_search_for = '';
        var autocomplete_temp_results = [];
        var autocomplete_current_result = '';

        $(document).keydown(function(e) {
            var keyCode = typeof e.which === "number" ? e.which : e.keyCode;

            /* Tab, Backspace and Delete key */
            if (keyCode === 8 || keyCode === 9 || keyCode === 46) {
                e.preventDefault();
                if (command !== ''){
                    if (keyCode === 8)
                        backSpace();
                    else if (keyCode === 46)
                        reverseBackSpace();
                    else if (keyCode === 9)
                        autoComplete();
                }
            }

            /* Ctrl + C */
            else if (e.ctrlKey && keyCode === 67){
                autocomplete_position = 0;
                endLine();
                newLine();
                reset();
            }

            /* Enter */
            else if (keyCode === 13){

                if (autocomplete_position !== 0){
                    autocomplete_position = 0;
                    command = autocomplete_current_result;
                }

                if (command.toLowerCase().split(' ')[0] in commands)
                    commands[command.toLowerCase().split(' ')[0]](command.split(' ').slice(1));
                else if(command.length !== 0)
                    $.ajax({
                        type: 'POST',
                        async: false,
                        data: {command: command, path: path},
                        cache: false,
                        success: function( response ){
                            response = $.parseJSON(response);
                            path = response.path;
                            $('terminal content').append('<line>'+response.result+'</line>');
                        }
                    });

                endLine();
                addToHistory(command);
                newLine();
                reset();
                $('terminal content').scrollTop($('terminal content').prop("scrollHeight"));
            }

            /* Home, End, Left and Right (change blink position) */
            else if ((keyCode === 35 || keyCode === 36 || keyCode === 37 || keyCode === 39) && command !== ''){
                e.preventDefault();
                $('line.current bl').remove();

                if (autocomplete_position !== 0){
                    autocomplete_position = 0;
                    command = autocomplete_current_result;
                }

                if (keyCode === 35)
                    blink_position = 0;

                if (keyCode === 36)
                    blink_position = command.length*-1;

                if (keyCode === 37 && command.length !== Math.abs(blink_position))
                    blink_position--;

                if (keyCode === 39 && blink_position !== 0)
                    blink_position++;

                printCommand();
                normalizeHtml();
            }

            /* Up and Down (suggest command from history)*/
            else if ((keyCode === 38 || keyCode === 40) && (command === '' || suggest)){
                e.preventDefault();
                if (keyCode === 38
                    && command_history.length
                    && command_history.length >= history_index*-1+1) {

                    history_index--;
                    command = command_history[command_history.length+history_index];
                    printCommand();
                    normalizeHtml();
                    suggest = true;
                }
                else if (keyCode === 40
                    && command_history.length
                    && command_history.length >= history_index*-1
                    && history_index !== 0) {

                    history_index++;
                    command = (history_index === 0) ? '' : command_history[command_history.length+history_index];
                    printCommand();
                    normalizeHtml();
                    suggest = (history_index === 0) ? false : true;
                }
            }

            /* type characters */
            else if (keyCode === 32
                || keyCode === 222
                || keyCode === 220
                || (
                    (keyCode >= 45 && keyCode <= 195)
                    && !(keyCode >= 112 && keyCode <= 123)
                    && keyCode != 46
                    && keyCode != 91
                    && keyCode != 93
                    && keyCode != 144
                    && keyCode != 145
                    && keyCode != 45
                )
            ){
                type(e.key);
                $('terminal content').scrollTop($('terminal content').prop("scrollHeight"));
            }
        });

        function reset() {
            command = '';
            history_index = 0;
            blink_position = 0;
            autocomplete_position = 0;
            autocomplete_current_result = '';
            suggest = false;
        }
        function endLine() {
            $('line.current bl').remove();
            $('line.current').removeClass('current');
        }
        function newLine() {
            $('terminal content').append('<line class="current"><path>'+path+'</path> <sp></sp> <t><bl></bl></t></line>');
        }
        function addToHistory(command) {
            if (command.length >= 2 &&  (command_history.length === 0 || command_history[command_history.length-1] !== command))
                command_history[command_history.length] = command;
        }
        function normalizeHtml() {
            let res = $('line.current t').html();
            let nres = res.split(' ').length == 1 ? '<cm>'+res+'</cm>' : '<cm>'+res.split(' ')[0]+'</cm> <code>'+res.split(' ').slice(1).join(' ').replace(/</g, '&lt;').replace(/>/g, '&gt;')+'</code>';

            $('line.current t').html(nres.replace('&lt;bl&gt;&lt;/bl&gt;', '<bl></bl>'));
        }
        function printCommand(cmd = '') {
            if (cmd === '')
                cmd = command;
            else
                blink_position = 0;

            let part1 = cmd.substr(0, cmd.length + blink_position);
            let part2 = cmd.substr(cmd.length + blink_position);

            $('line.current t').html(part1 + '<bl></bl>' + part2);
        }
        function type(t) {
            history_index = 0;
            suggest = false;

            if (autocomplete_position !== 0){
                autocomplete_position = 0;
                command = autocomplete_current_result;
            }
            if (command[command.length-1] === '/' && t === '/')
                return;

            let part1 = command.substr(0, command.length + blink_position);
            let part2 = command.substr(command.length + blink_position);
            command = part1+t+part2;

            printCommand();
            normalizeHtml();
        }
        function backSpace() {
            if (autocomplete_position !== 0){
                autocomplete_position = 0;
                command = autocomplete_current_result;
            }

            let part1 = command.substr(0, command.length + blink_position);
            let part2 = command.substr(command.length + blink_position);
            command = part1.substr(0, part1.length-1)+part2;

            printCommand();
            normalizeHtml();
        }
        function reverseBackSpace() {
            let part1 = command.substr(0, command.length + blink_position);
            let part2 = command.substr(command.length + blink_position);
            command = part1+part2.substr(1);

            if (blink_position !== 0)
                blink_position++;

            printCommand();
            normalizeHtml();
        }
        function autoComplete() {
            if(autocomplete_search_for !== command){
                autocomplete_search_for = command;
                autocomplete_temp_results = [];

                if (command.split(' ').length === 1) {
                    let cmdlist = commands_list.concat(Object.keys(commands));
                    autocomplete_temp_results = cmdlist
                        .filter(function (cm) {return (cm.length > command.length && cm.substr(0, command.length).toLowerCase() == command.toLowerCase()) ? true : false;})
                        .reverse().sort(function (a, b) {return b.length - a.length;});
                }

                else if (command.split(' ').length === 2){
                    let cmd = command.split(' ')[0];
                    let cmd_parameter = command.split(' ')[1];
                    var temp_cmd = '';

                    if (cmd === 'cd' || cmd === 'cp' || cmd === 'mv' || cmd === 'cat'){
                        switch (cmd) {
                            case "cd": temp_cmd = 'ls -d '+cmd_parameter+'*/'; break;
                            case "cp":case "mv": temp_cmd = 'ls -d '+cmd_parameter+'*/'; break;
                            case "cat": temp_cmd = 'ls -p | grep -v /'; break;
                            default: temp_cmd = '';
                        }

                        $.ajax({
                            type: 'POST',
                            async: false,
                            data: {command: temp_cmd, path: path},
                            cache: false,
                            success: function( response ){
                                response = $.parseJSON(response);
                                autocomplete_temp_results = response.result.split('<br>')
                                    .filter(function (cm) {return (cm.length !== 0) ? true : false;});
                            }
                        });
                    }
                }
            }

            if (autocomplete_temp_results.length && autocomplete_temp_results.length > Math.abs(autocomplete_position)){
                autocomplete_position--;
                autocomplete_current_result = ((command.split(' ').length === 2) ? command.split(' ')[0]+' ' : '')+autocomplete_temp_results[autocomplete_temp_results.length+autocomplete_position];
                printCommand(autocomplete_current_result);
                normalizeHtml();
            }
            else{
                autocomplete_position = 0;
                autocomplete_current_result = '';
                printCommand();
                normalizeHtml();
            }
        }


        /**********************************************************/
        /*                     Local Commands                     */
        /**********************************************************/

        var commands = {
            'clear' : clear,
            'history': history
        };

        function clear(){
            $('terminal content').html('');
        }

        function history(arg){
            var res = [];
            let start_from = arg.length ? Number.isInteger(Number(arg[0])) ? Number(arg[0]) : 0 : 0;

            if (start_from != 0 && start_from <= command_history.length)
                for (var i = command_history.length-start_from; i < command_history.length; i++) { res[res.length] = (i+1)+' &nbsp;'+command_history[i]; }
            else
                command_history.forEach(function(item, index) { res[res.length] = (index+1)+' &nbsp;'+item; });

            $('terminal content').append('<line>'+res.join('<br>')+'</line>');
      }

    </script>
  </head>
  <body>
    <terminal>
      <header>
        <buttons>
          <close title="close"></close>
          <maximize title="maximize"></maximize>
          <minimize title="minimize"></minimize>
        </buttons>
        <title>Terminal.php &nbsp; (www-data@wlemgjk31njcrvmekgvdrdys9zrqrdzldj98uyvl-web-8665977b76-ddnlw)</title>
      </header>
      <content>
        <line class="current"><path>/challenge</path> <sp></sp> <t><bl></bl></t></line>
      </content>
    </terminal>
    <footer>Coded by <a href="https://github.com/smartwf">SmartWF</a></footer>
  </body>
</html>
