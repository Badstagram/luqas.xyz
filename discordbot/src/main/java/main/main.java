package main;


import commands.*;
import listeners.commandListener;
import listeners.readyListener;
import net.dv8tion.jda.api.AccountType;
import net.dv8tion.jda.api.JDA;
import net.dv8tion.jda.api.JDABuilder;
import net.dv8tion.jda.api.OnlineStatus;
import net.dv8tion.jda.api.entities.Activity;
import net.dv8tion.jda.api.hooks.ListenerAdapter;
import util.token;

import javax.security.auth.login.LoginException;

public class main extends ListenerAdapter {


    public static JDABuilder builder;


    public static void main(String[] Args) {

        builder = new JDABuilder(AccountType.BOT);

        builder.setToken(token.TOKEN);
        builder.setAutoReconnect(true);

        builder.setStatus(OnlineStatus.ONLINE);

        builder.setActivity(Activity.watching("https://luqas.xyz"));


        addListeners();
        addCommands();

        try {
            JDA jda = main.builder.build();
        } catch (LoginException e) {
            e.printStackTrace();
        }
    }






    public static void addCommands() {
        commandHandler.commands.put("say",new cmdSay());



    }

    public static void addListeners(){

        builder.addEventListeners(new readyListener());
        builder.addEventListeners(new commandListener());
    }
}