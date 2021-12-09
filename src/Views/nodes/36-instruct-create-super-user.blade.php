<!-- resources/views/vendor/rockhopsoft/nodes/36-instruct-create-super-user.blade.php -->

<h5 class="slBlueDark">Create Super User, Disable Root</h5>

<p>
    For these instructions, the new user is named
    <span class="red">rockhopuser</span>, but you can call it anything.
</p>
<p>
    Instead of 22, we will select a SSH Port to connect to (between 23 and 1023).
    The custom SSH port here will be <span class="red">123</span>.
</p>
<p>
    For these instructions, the Server IP Address will be
    <span class="red">123.45.67.890</span>. We will setup SSH access restricted
    to your fixed IP Adress — hopefully this is <a href="https://www.digitalocean.com/community/tutorials/how-to-set-up-and-configure-an-openvpn-server-on-ubuntu-20-04" target="_blank">your VPN</a>'s IP Address —
    here it will be <span class="red">98.76.54.321</span>.
</p>
<pre>% ssh root@<span class="red">server.ip.address</span></pre>
<div class="m0"><i>e.g.</i></div>
<pre>% ssh root@<span class="red">123.45.67.890</span></pre>
<p><br /></p>


<div class="w100 round10 brdRed p15">
    <h5 class="slRedDark">
        <i class="fa fa-bug" aria-hidden="true"></i> Temporary Bug Workaround
    </h5>
    <p>
        Recently, fresh DigitalOcean Droplets have been giving errors when 'apt upgrade' is run.
        <a href="https://askubuntu.com/questions/1266543/do-release-upgrade-stuck-configuring-openssh-server"
            target="_blank">A post</a> helped me through this [temporary] problem...
    </p>
    <p>
    <b>Before running the main installation steps below, run the first three commands manually:</b>
    </p>
<pre>$ apt-add-repository universe
$ apt update
$ echo "Y" | apt upgrade</pre>
    <p>
        If the 'apt upgrade' command hangs on a sshd_config screen,
        close your terminal tab and reconnect to the server in a fresh terminal.
        Then get a list of locked processed:
    </p>
    <pre>sudo lsof /var/cache/apt/archives/lock</pre>
    <p>
        Hopefully, this provides some results including a line like this:
    </p>
<pre>focal   <span class="red">14627</span> root   66u   REG  259,3        0 12328392 /var/cache/apt/archives/lock</pre>
    <p>
        Use those results to identify the process number to kill:
    </p>
<pre>sudo kill <span class="red">14627</span>  # focal upgrade process</pre>
    <p>
        If this workaround works, you should now hopefully be
        able to continue the installation process as intended below.
    </p>
</div>
<p><br /></p>
<p><br /></p>


<div style="min-height: 400px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" style="margin: 0px;">
            <a class="nav-link active" id="scripts-tab" data-toggle="tab"
                href="#scripts" role="tab" aria-controls="scripts" aria-selected="true"
                >Auto-Install Scripts</a>
        </li>
        <li class="nav-item" style="margin: 0px;">
            <a class="nav-link" id="commands-tab" data-toggle="tab"
                href="#commands" role="tab" aria-controls="commands" aria-selected="false"
                >All Commands, One-by-One</a>
        </li>
    </ul>
    <div class="tab-content tabContentWraps">
        <div class="tab-pane fade show active" id="scripts" role="tabpanel" aria-labelledby="scripts-tab">

            <p>
                In your new server, first pull down a copy of
                <a href="https://github.com/rockhopsoft/install-scripts" target="_blank"
                    >the Survloop installation scripts</a>. Then run the
                <a href="https://github.com/rockhopsoft/install-scripts/blob/master/src/ubuntu20/create-super-user.sh"
                    target="_blank">Create Super User script</a> to create a super user to be used instead
                    of the root account. This will restrict SSH access to your IP, or that of
                <a href="https://www.digitalocean.com/community/tutorials/how-to-set-up-and-configure-an-openvpn-server-on-ubuntu-20-04"
                    target="_blank">your VPN tunnel</a>. This script includes an
                <a href="https://sysadminjournal.com/how-to-install-fail2ban-on-ubuntu-20-04/" target="_blank"
                    >installation of Fail2ban</a>, and disables some unneeded networking tools.
            </p>
            <p>
                When prompted, enter your new super user's strong password —
                and copy it somewhere super duper safe, like a password manager.
                This first installation script will configure your SSH access to a
                custom port number. Be sure to securely copy this port number too.
            </p>
            <p>
                <b>If you have a YubiKey</b>, then you can optionally enter your token for UFA.
                Press your YubiKey USB button, and delete all but the first 12 characters for this token.
                (<a href="https://medium.com/@ismailyenigul/ssh-public-key-mfa-with-yubikey-on-centos-8-ubuntu-20-4-lts-8fb368133690"
                    target="_blank">SSH Public key+MFA with Yubikey on Ubuntu 20.04 LTS</a>)
            </p>
            <p><br /></p>
<pre>$ git clone http://github.com/rockhopsoft/install-scripts
$ bash install-scripts/src/ubuntu20/create-super-user.sh</pre>

        </div>
        <div class="tab-pane fade" id="commands" role="tabpanel" aria-labelledby="commands-tab">

            <p>
                This is a summary of
                <a href="https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-20-04"
                    target="_blank">Digital Ocean's Initial Server Setup with Ubuntu 20.04</a>.
                The last line copies your SSH Key from your root user to your new one.
            </p>
<pre>$ apt-add-repository universe
$ apt update
$ echo "Y" | apt upgrade
$ adduser <span class="red">rockhopuser</span>
$ usermod -aG sudo <span class="red">rockhopuser</span>
$ rsync --archive --chown=<span class="red">rockhopuser</span>:<span class="red">rockhopuser</span> ~/.ssh /home/<span class="red">rockhopuser</span></pre>
            <p></p>
            <hr>
            <h5 class="slBlueDark">If you have a Yubikey...</h5>
            <p>
                You will need the first 12 characters of your Yubikey,
                e.g. <span class="red">cccccfghjcff</span>:
            </p>
<pre>$ apt install libpam-yubico -y
$ echo "<span class="red">rockhopuser</span>:<span class="red">cccccfghjcff</span>" &gt;&gt; /etc/yubico
$ sed -i 's/&#64;include common-auth/auth required pam_yubico.so id=16 debug authfile=\/etc\/yubico/g' /etc/pam.d/sshd
$ sed -i 's/ChallengeResponseAuthentication no/ChallengeResponseAuthentication yes/g' /etc/ssh/sshd_config
$ sed -i 's/# Authentication:/AuthenticationMethods publickey,keyboard-interactive/g' /etc/ssh/sshd_config
$ sed -i 's/UsePAM no/UsePAM yes/g' /etc/ssh/sshd_config
$ systemctl restart sshd</pre>

            <h5>If you do not have a Yubikey...</h5>
<pre>$ sed -i 's/UsePAM yes/UsePAM no/g' /etc/ssh/sshd_config
$ systemctl restart sshd</pre>
            <p><br /></p>

            <h5 class="slBlueDark">
                Edit Port and User IP in Uncomplicated Firewall (UFW)
            </h5>
            <p>
                Instead of 22, what SSH PORT will you connect to, between 23 and 1023?
                e.g. <span class="red">123</span>
            </p>
            <p>
                This will also restrict SSH access to <a href="https://www.digitalocean.com/community/tutorials/how-to-set-up-and-configure-an-openvpn-server-on-ubuntu-20-04"
                    target="_blank">your VPN</a>'s IP,
                e.g. <span class="red">98.76.54.321</span>
            </p>
<pre>$ sed -i "s/#Port 22/Port <span class="red">123</span>/g" /etc/ssh/sshd_config
$ sed -i 's/PermitRootLogin yes/PermitRootLogin no/g' /etc/ssh/sshd_config
$ sed -i 's/#LogLevel INFO/LogLevel VERBOSE/g' /etc/ssh/sshd_config
$ ufw default deny incoming
$ ufw default allow outgoing
$ ufw limit from <span class="red">98.76.54.321</span> to any port <span class="red">123</span>
$ echo "y" | ufw enable
$ systemctl restart sshd</pre>
            <p>Disabling various over~networking</p>
<pre>$ sed -i 's/#net.ipv4.conf.default.rp_filter=1/net.ipv4.conf.default.rp_filter=1/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv4.conf.all.rp_filter=1/net.ipv4.conf.all.rp_filter=1/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv4.conf.all.accept_redirects = 0/net.ipv4.conf.all.accept_redirects = 0/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv6.conf.all.accept_redirects = 0/net.ipv6.conf.all.accept_redirects = 0/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv4.conf.all.send_redirects = 0/net.ipv4.conf.all.send_redirects = 0/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv4.conf.all.accept_source_route = 0/net.ipv4.conf.all.accept_source_route = 0/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv6.conf.all.accept_source_route = 0/net.ipv6.conf.all.accept_source_route = 0/g' /etc/sysctl.conf
$ sed -i 's/#net.ipv4.conf.all.log_martians = 1/net.ipv4.conf.all.log_martians = 1/g' /etc/sysctl.conf
$ sysctl -p</pre>
            <p><br /></p>

            <h5 class="slBlueDark">Install Fail2ban</h5>
            <p>Include exception for <a href="https://www.digitalocean.com/community/tutorials/how-to-set-up-and-configure-an-openvpn-server-on-ubuntu-20-04"
                    target="_blank">your VPN</a>'s IP address:</p>
<pre>$ apt update
$ apt upgrade
$ add-apt-repository universe
$ echo "Y" | apt install fail2ban
$ systemctl start fail2ban
$ systemctl enable fail2ban
$ cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
$ sed -i "s/#ignoreip = 127.0.0.1\/8 ::1/ignoreip = <span class="red">98.76.54.321</span>/g" /etc/fail2ban/jail.local
$ sed -i 's/bantime  = 10m/bantime  = 30m/g' /etc/fail2ban/jail.local
$ sed -i 's/maxretry = 5/maxretry = 3/g' /etc/fail2ban/jail.local
$ sed -i 's/enabled = false/enabled = true/g' /etc/fail2ban/jail.local
$ systemctl enable fail2ban
$ systemctl status fail2ban.service
$ fail2ban-client status sshd</pre>
        </div>
    </div>

</div>
<p><br /></p>

<p>Give the server a minute or two to reboot...</p>
<pre># reboot</pre>
<p>Then log back into the server with your new super user.</p>
<pre>% ssh <span class="red">super_user</span>@<span class="red">server.ip.address</span> -p <span class="red">custom_ssh_port</span></pre>
<div class="m0"><i>e.g.</i></div>
<pre>% ssh <span class="red">rockhopuser</span>@<span class="red">123.45.67.890</span> -p <span class="red">123</span></pre>
<p><br /></p>
