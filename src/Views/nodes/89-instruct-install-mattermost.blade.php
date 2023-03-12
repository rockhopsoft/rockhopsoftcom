<!-- resources/views/vendor/rockhopsoftcom/nodes/
    89-instruct-install-mattermost.blade.php -->

<h5 class="slBlueDark">2) Install Mattermost</h5>
<p>As the super user you created, enter 'sudo su' mode:</p>
<pre>$ sudo su</pre>
<p><br /></p>

<div style="min-height: 240px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" style="margin: 0px;">
            <a class="nav-link active" id="scriptsJitsi-tab" data-toggle="tab" href="#scriptsJitsi" role="tab" aria-controls="scriptsJitsi" aria-selected="true">Auto-Install Scripts</a>
        </li>
        <li class="nav-item" style="margin: 0px;">
            <a class="nav-link" id="commandsJitsi-tab" data-toggle="tab" href="#commandsJitsi" role="tab" aria-controls="commandsJitsi" aria-selected="false">All Commands, One-by-One</a>
        </li>
    </ul>
    <div class="tab-content tabContentWraps" id="myTabContent">
        <div class="tab-pane fade show active" id="scriptsJitsi" role="tabpanel" aria-labelledby="scriptsJitsi-tab">

            <p>
                Run the <a href="https://github.com/rockhopsoft/install-scripts/blob/master/src/ubuntu20/jitsi-install.sh"
                    target="_blank">Jitsi Install script</a>, largely based on
                <a href="https://www.vultr.com/docs/install-jitsi-meet-on-ubuntu-20-04-lts"
                    target="_blank">instructions by Vultr</a>.
                This was most reliable when setting the Server Hostname to the
                domain name — for this example, <span class="red">rockhop.live</span>.
            </p>
<pre># bash /root/install-scripts/src/ubuntu20/jitsi-install.sh <span class="red">server_hostname</span> <span class="red">server_ip</span></pre>
<p><i>e.g.</i></p>
<pre># bash /root/install-scripts/src/ubuntu20/jitsi-install.sh <span class="red">rockhop.live</span> <span class="red">123.45.67.890</span></pre>

        </div>
        <div class="tab-pane fade" id="commandsJitsi" role="tabpanel"
            aria-labelledby="commandsJitsi-tab">
            <p>
            <a href="https://docs.mattermost.com/guides/deployment.html#server-installation"
                target="_blank"><b>Install Mattermost Omnibus</b></a>
            </p>
            <p>

<pre># curl -o- https://deb.packages.mattermost.com/repo-setup.sh | sudo bash
# sudo apt install mattermost-omnibus -y</pre>

            <p><br /></p>
            <p>
                If all went well, then you should be able to browse to
                your domain and create your first super user in Mattermost.
            </p>
            <p>
                But you'll still need to setup SMTP to send emails to users.
                Linking a low-usage Mattermost installation to a
                <a href="https://www.mailgun.com/" target="_blank"
                    >Mailgun</a> account should be free.
<!---
                <a href="https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-postfix-as-a-send-only-smtp-server-on-ubuntu-20-04"
                    target="_blank">setup SMTP to send emails to users</a>.
            </p>
<pre># echo "Y" | sudo apt install mailutils</pre>
            <p>
                In the Postfix Configuration interfaces, select
                "Internet Site" and enter your domain name.
            </p>
<pre># dpkg-reconfigure postfix</pre>
            <p>
                Next, open the Postfix configuration file:
            </p>
<pre># nano /etc/postfix/main.cf</pre>
            <p>
                Set "inet_interfaces = loopback-only", and
                "mydestination = localhost.$mydomain, localhost, $myhostname",
                and save.
            </p>
<pre># systemctl restart postfix</pre>
            <p><br /></p>
--->

        </div>
    </div>

</div>
