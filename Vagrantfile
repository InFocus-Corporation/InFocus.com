# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

	config.vm.box = "ubuntu/trusty64"

        config.vm.network :private_network, ip: "192.168.111.222"
        config.vm.synced_folder "./public_html", "/srv/www/infocus", :owner=>1002, :group=>1002

        config.vm.hostname = 'default'

        pubkey = File.read("deployment/keys/vagrant.key.pub")
	config.vm.provision "shell" do |s|
            s.inline = "echo $1 >> ~vagrant/.ssh/authorized_keys"
            s.args = [pubkey]
        end

        config.vm.provision "shell" do |s|
            s.inline = "sudo apt-get update"
        end

	config.vm.provision "ansible" do |ansible|
            ansible.inventory_path = "deployment/dev"
            ansible.playbook = "deployment/initial_provision.yml"
        end

	config.vm.provider "virtualbox" do |v|
		v.memory = 4096
	end

end
