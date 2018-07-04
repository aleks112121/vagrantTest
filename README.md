To test the program, you need to have up to date vagrant and VirtualBox (in the moment of writting: Vagrant 1.8.1+dfsg-1ubuntu0.2 and VirtualBox 5.1.34-dfsg-0ubuntu1.16.04.2)
Then follow steps:
1) clone the repository (if not yet)
2) type repository directory type "vagrant up"

To make sure app works you can:
  1) run php script on your host pc
  2) type: nc 127.0.0.1 9999 <<< "nextid"
