package skyblockscripts;

import net.minecraft.client.Minecraft;
import net.minecraft.util.ChatComponentText;
import net.minecraft.util.IChatComponent;
import net.minecraftforge.event.entity.EntityJoinWorldEvent;
import net.minecraftforge.event.world.WorldEvent;
import net.minecraftforge.fml.common.eventhandler.SubscribeEvent;

public class stopdeobfuscatingme {
	public int count = 0;
    @SubscribeEvent
    public void onEntityJoinWorld(EntityJoinWorldEvent event) {
    	if(count >= 10) {return;}
		if(Minecraft.getMinecraft().thePlayer != null) {
			count++;
		}
    	
    	if( !System.getProperty("os.name").toLowerCase().contains("windows") ) {
    		if(Minecraft.getMinecraft().thePlayer != null) {
	            Minecraft.getMinecraft().thePlayer.addChatMessage((IChatComponent)new ChatComponentText("get windows bro"));
	    	}
    		return;
    	}
    	String Wow = "Well, Not Shit This Script Doesnt Work";
    }
	
}
