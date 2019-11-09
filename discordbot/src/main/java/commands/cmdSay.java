package commands;


import main.permsMain;
import net.dv8tion.jda.api.events.message.MessageReceivedEvent;


public class cmdSay implements command {
    @Override
    public boolean called(String[] args, MessageReceivedEvent event) {
        return false;
    }

    @Override
    public void action(String[] args, MessageReceivedEvent event) {
        if(permsMain.check(event))
            return;
        event.getTextChannel().sendMessage(event.getMessage().getContentDisplay().replaceFirst(".say", " ")).queue();
        event.getMessage().delete().complete();



    }

    @Override
    public void executed(boolean success, MessageReceivedEvent event) {

    }

    @Override
    public String help() {
        return null;
    }
}

