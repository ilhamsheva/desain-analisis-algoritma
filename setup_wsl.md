This is how to setup WSl and Github in WSL

1. *Open PowerShell as Administrator*
    - Right-click on the PowerShell "Run as administrator".

2. *Update WSL*
    - Type the following command in PowerShell:
      sh
      wsl --update
      
    - Wait for the process to complete.

3. *Set the default user for Ubuntu to root*
    - Type the following command:
      sh
      Ubuntu config --default-user root
      

4. *Open Terminal and Select Ubuntu*
    - Type the following command to install Zsh:
      sh
      apt install zsh -y
      
      
5. *Install Oh My Zsh:*
    - Type the following command:
      sh
      sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"
      

6. *Instal Plugin Zsh*
    - Type the following command to install zsh-autosuggestions:
      git clone https://github.com/zsh-users/zsh-autosuggestions.git $ZSH_CUSTOM/plugins/zsh-autosuggestions
      
    - Type the following command to install zsh-syntax-highlighting:
      sh
      git clone https://github.com/zsh-users/zsh-syntax-highlighting.git $ZSH_CUSTOM/plugins/zsh-syntax-highlighting
      

7. **Edit Zsh Configuration**
    - Type:
      sh
      nano /root/.zshrc
      
    - Press `Ctrl + W`, type `plugins`, and press `Enter`. 
    - Add the following plugins:
      sh
      plugins=(git zsh-autosuggestions zsh-syntax-highlighting)
      
    - Press `Ctrl + S`, then `Ctrl + X`

8. **Reload Zsh Configuration**
    - Type:
      sh
      source /root/.zshrc
      

9. **Set Up SSH Key for GitHub**
    - Open your browser and log into your GitHub account.
    - Go to `Settings` -> `SSH and GPG keys` -> `New SSH key`.
    - Return to the Ubuntu terminal and type:
      sh
      ssh-keygen
      
    - Press `Enter` for all prompts.
    - Ketikkan perintah berikut untuk menampilkan kunci SSH:
      sh
      cat /root/.ssh/id_rsa.pub
      ```
    - Copy all output and add it to GitHub as a new SSH key.