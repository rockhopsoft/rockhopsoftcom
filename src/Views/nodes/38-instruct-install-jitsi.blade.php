<!-- resources/views/vendor/survlooporg/nodes/38-instruct-install-jitsi.blade.php -->

<h5 class="slBlueDark">2) Install Jitsi-Meet</h5>
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
		<div class="tab-pane fade" id="commandsJitsi" role="tabpanel" aria-labelledby="commandsJitsi-tab">

			<p>The <a href="https://github.com/rockhopsoft/install-scripts/blob/master/src/ubuntu20/jitsi-install.sh" target="_blank">Jitsi Install script</a> is largely based on <a href="https://www.vultr.com/docs/install-jitsi-meet-on-ubuntu-20-04-lts" target="_blank">instructions by Vultr</a>. This was most reliable when setting the Server Hostname to the domain name — for this example, <span class="red">rockhop.live</span>.

<pre># echo "Y" | apt-get install gnupg2 apt-transport-https nginx-full
# apt-get update
# apt-get upgrade

# ufw allow OpenSSH
# ufw allow http
# ufw allow https
# ufw allow in 10000:20000/udp
# echo "y" | ufw enable

# apt install -y openjdk-8-jre-headless
# java -version
# echo "JAVA_HOME=$(readlink -f /usr/bin/java | sed "s:bin/java::")" | sudo tee -a /etc/profile
# source /etc/profile

# apt install -y nginx
# systemctl start nginx.service
# systemctl enable nginx.service

# cd /tmp
# wget -qO - https://download.jitsi.org/jitsi-key.gpg.key | sudo apt-key add -
# echo "deb https://download.jitsi.org stable/"  | sudo tee -a /etc/apt/sources.list.d/jitsi-stable.list
# apt update
# apt install -y jitsi-meet

# hostnamectl set-hostname <span class="red">rockhop.live</span>
# echo "127.0.0.1 localhost <span class="red">rockhop.live</span> <span class="red">123.45.67.890</span>" >> /etc/hosts
# systemctl reload nginx</pre>

			<p><br /></p>
			<p>
				If all went well, then you should associate a domain name
				and setup an SSL Certificate:
			</p>
<pre># bash /usr/share/jitsi-meet/scripts/install-letsencrypt-cert.sh</pre>
			<p><br /></p>

			<p><b>Customize Jitsi (Optional)</b></p>
			<p>If you want to customize the site watermark logo, and favicon, just follow these extra steps:</p>
<pre>wget <span class="red">https://path.to/logo/image/filename.png</span>
cp <span class="red">filename.png</span> /usr/share/jitsi-meet/images/watermark-custom.png
sed -i "s/images\/watermark.svg/images\/watermark-custom.png/g" /usr/share/jitsi-meet/interface_config.js</pre>

<pre>mv /usr/share/jitsi-meet/images/favicon.ico /usr/share/jitsi-meet/images/favicon-orig.ico
wget <span class="red">https://path.to/logo/image/favicon.ico</span>
cp <span class="red">favicon.ico</span> /usr/share/jitsi-meet/images/watermark-custom.png
sed -i "s/images\/watermark.svg/images\/watermark-custom.png/g" /usr/share/jitsi-meet/interface_config.js</pre>


		</div>
	</div>

</div>
