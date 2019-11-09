package main;

import net.dv8tion.jda.api.entities.Role;
import net.dv8tion.jda.api.events.message.MessageReceivedEvent;

import util.STATIC;

import java.util.Arrays;

public class permsMain {

        public static boolean check(MessageReceivedEvent event) {

            for ( Role r : event.getGuild().getMember(event.getAuthor()).getRoles() ) {
                if (Arrays.stream(STATIC.PERMS).parallel().anyMatch(r.getName()::contains))
                    return false;
                else
                    event.getTextChannel().sendMessage(":warning:  Sorry, " + event.getAuthor().getAsMention() + ", du hast nicht die ausreichenden Rechte um diesen Command zu benutzen!").queue();
            }
            return true;


        }
}