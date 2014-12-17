package com.evoting;

import java.util.ArrayList;
import java.util.HashMap;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.evoting.JSONParser;
import com.evoting.R;
import com.evoting.R.color;
import com.evoting.Vote;

import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.util.Base64;
import android.view.Gravity;
import android.view.Menu;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.TextView;
import android.util.Log;
import java.util.List;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import com.evoting.Vote;

public class Vote extends Activity {

	AlertDialog.Builder viewSummary;
	// Progress Dialog
	private ProgressDialog pDialog;

	// onBackPressed
	private boolean doubleBackToExitPressedOnce = false;

	String voterID;
	String president;
	String presidentID;
	String vice_president;
	String vice_presidentID;
	String secretary;
	String secretaryID;
	String treasurer;
	String treasurerID;
	String auditor;
	String auditorID;
	String piof;
	String pioID;
	String peace_officer;
	String peace_officerID;
	String grade_reps;
	String grade_repID;
	
	Boolean moveToMain;

	private static final String SUBMIT_URL = "http://192.168.1.225/Electrovots/Android/submit_vote.php";

	// Json ID's
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_MESSAGE = "message";
	private static final String TAG_NAME = "name";
	
	SharedPreferences preferences;
	public static final String PrefFile = "Prefs";
	public static final String Voter_Username = "Voter_Username";
	public static final String Voter_ID = "Voter_ID";

	public static final String cPresident = "cPresident";
	public static final String cPresidentID = "cPresidentID";
	public static final String cPresidentSelected = "cPresidentSelected";

	public static final String cVice_President = "cVice_President";
	public static final String cVice_PresidentID = "cVice_PresidentID";
	public static final String cVice_PresidentSelected = "cVice_PresidentSelected";

	public static final String cSecretary = "cSecretary";
	public static final String cSecretaryID = "cSecretaryID";
	public static final String cSecretarySelected = "cSecretarySelected";

	public static final String cTreasurer = "cTreasurer";
	public static final String cTreasurerID = "cTreasurerID";
	public static final String cTreasurerSelected = "cTreasurerSelected";

	public static final String cAuditor = "cAuditor";
	public static final String cAuditorID = "cAuditorID";
	public static final String cAuditorSelected = "cAuditorSelected";

	public static final String cPIO = "cPIO";
	public static final String cPIOID = "cPIOID";
	public static final String cPIOSelected = "cPIOSelected";

	public static final String cPeace_Officer = "cPeace_Officer";
	public static final String cPeace_OfficerID = "cPeace_OfficerID";
	public static final String cPeace_OfficerSelected = "cPeace_OfficerSelected";

	public static final String cGrade_Rep = "cGrade_Rep";
	public static final String cGrade_RepID = "cGrade_RepID";
	public static final String cGrade_RepSelected = "cGrade_RepSelected";

	public static final String cVote_Straight = "cVote_Straight";
	public static final String cVote_StraightID = "cVote_StraightID";
	public static final String cVote_StraightSelected = "cVote_StraightSelected";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.vote_container);

		preferences = getSharedPreferences("PrefFile", MODE_PRIVATE);
		SharedPreferences.Editor edit = preferences.edit();

		viewSummary = new AlertDialog.Builder(Vote.this);
		
		moveToMain=false;

		// SharedPreferences.Editor editor = preferences.edit();
		voterID = preferences.getString(Voter_ID, "No Name");
		president = preferences.getString(cPresident, "None");
		presidentID = preferences.getString(cPresidentID, "00");
		vice_president = preferences.getString(cVice_President, "None");
		vice_presidentID = preferences.getString(cVice_PresidentID, "00");
		secretary = preferences.getString(cSecretary, "None");
		secretaryID = preferences.getString(cSecretaryID, "00");
		treasurer = preferences.getString(cTreasurer, "None");
		treasurerID = preferences.getString(cTreasurerID, "00");
		auditor = preferences.getString(cAuditor, "None");
		auditorID = preferences.getString(cAuditorID, "00");
		piof = preferences.getString(cPIO, "None");
		pioID = preferences.getString(cPIOID, "00");
		peace_officer = preferences.getString(cPeace_Officer, "None");
		peace_officerID = preferences.getString(cPeace_OfficerID, "00");
		grade_reps = preferences.getString(cGrade_Rep, "None");
		grade_repID = preferences.getString(cGrade_RepID, "00");

		// imageChange
		boolean bpres = preferences.getBoolean(cPresidentSelected, false);
		boolean bvice_pres = preferences.getBoolean(cVice_PresidentSelected, false);
		boolean bsec = preferences.getBoolean(cSecretarySelected, false);
		boolean btrea = preferences.getBoolean(cTreasurerSelected, false);
		boolean baudit = preferences.getBoolean(cAuditorSelected, false);
		boolean bpio = preferences.getBoolean(cPIOSelected, false);
		boolean bpo = preferences.getBoolean(cPeace_OfficerSelected, false);
		boolean bgrade_rep = preferences.getBoolean(cGrade_RepSelected, false);
		boolean vote_strt = preferences.getBoolean(cVote_StraightSelected, false);

		//
		ImageView pres = (ImageView) findViewById(R.id.imageViewPosition1);
		ImageView pres2 = (ImageView) findViewById(R.id.imageViewPosition1_1);
		ImageView vice_pres = (ImageView) findViewById(R.id.imageViewPosition2);
		ImageView vice_pres2 = (ImageView) findViewById(R.id.imageViewPosition2_2);
		ImageView sec = (ImageView) findViewById(R.id.imageViewPosition3);
		ImageView sec2 = (ImageView) findViewById(R.id.imageViewPosition3_3);
		ImageView trea = (ImageView) findViewById(R.id.imageViewPosition4);
		ImageView trea2 = (ImageView) findViewById(R.id.imageViewPosition4_4);
		ImageView audit = (ImageView) findViewById(R.id.imageViewPosition5);
		ImageView audit2 = (ImageView) findViewById(R.id.imageViewPosition5_5);
		ImageView pio = (ImageView) findViewById(R.id.imageViewPosition6);
		ImageView pio2 = (ImageView) findViewById(R.id.imageViewPosition6_6);
		ImageView po = (ImageView) findViewById(R.id.imageViewPosition7);
		ImageView po2 = (ImageView) findViewById(R.id.imageViewPosition7_7);
		ImageView grade_rep = (ImageView) findViewById(R.id.imageViewPosition8);
		ImageView grade_rep2 = (ImageView) findViewById(R.id.imageViewPosition8_8);
		ImageView votest1 = (ImageView) findViewById(R.id.imageViewVote);
		ImageView votest2 = (ImageView) findViewById(R.id.imageViewVote2);

		// only for android 4.7-3.7 large category
		
		
		if (vote_strt) {
			votest1.setVisibility(View.GONE);
			votest2.setVisibility(View.VISIBLE);
			
			
			
		}
		else{
			votest1.setVisibility(View.VISIBLE);
			votest2.setVisibility(View.GONE);
		}
	
		
		if (bpres) {
			pres.setVisibility(View.GONE);
			pres2.setVisibility(View.VISIBLE);
		}else{
			pres.setVisibility(View.VISIBLE);
			pres2.setVisibility(View.GONE);
		}
		
		if (bvice_pres) {
			vice_pres.setVisibility(View.GONE);
			vice_pres2.setVisibility(View.VISIBLE);
		}else{
			vice_pres.setVisibility(View.VISIBLE);
			vice_pres2.setVisibility(View.GONE);
		}
		
		if (bsec) {
			sec.setVisibility(View.GONE);
			sec2.setVisibility(View.VISIBLE);
		}else{
			sec.setVisibility(View.VISIBLE);
			sec2.setVisibility(View.GONE);
		}
		
		if (btrea) {
			trea.setVisibility(View.GONE);
			trea2.setVisibility(View.VISIBLE);
		}else{
			trea.setVisibility(View.VISIBLE);
			trea2.setVisibility(View.GONE);
		}
		
		if (baudit) {
			audit.setVisibility(View.GONE);
			audit2.setVisibility(View.VISIBLE);
		}else{
			audit.setVisibility(View.VISIBLE);
			audit2.setVisibility(View.GONE);
		}
		
		if (bpio) {
			pio.setVisibility(View.GONE);
			pio2.setVisibility(View.VISIBLE);
		}else{
			pio.setVisibility(View.VISIBLE);
			pio2.setVisibility(View.GONE);
		}
		
		if (bpo) {
			po.setVisibility(View.GONE);
			po2.setVisibility(View.VISIBLE);
		}else{
			po.setVisibility(View.VISIBLE);
			po2.setVisibility(View.GONE);
		}
		
		if (bgrade_rep) {
			grade_rep.setVisibility(View.GONE);
			grade_rep2.setVisibility(View.VISIBLE);		
		}else{
			grade_rep.setVisibility(View.VISIBLE);
			grade_rep2.setVisibility(View.GONE);	
		}
		
		// This is for testing
		/*
		 * Toast toast = Toast.makeText(Vote.this, bvice_pres+"haha",
		 * Toast.LENGTH_SHORT); toast.setGravity(Gravity.CENTER, 0, 0);
		 * toast.show();
		 */

	}

	public void showPresident(View v) {
		Intent activityIntent = new Intent(this, President.class);
		startActivity(activityIntent);
		finish();
	}

	public void showVicePresident(View v) {
		Intent activityIntent = new Intent(this, Vice_President.class);
		startActivity(activityIntent);
		finish();
	}

	public void showSecretary(View v) {
		Intent activityIntent = new Intent(this, Secretary.class);
		startActivity(activityIntent);
		finish();
	}

	public void showTreasurer(View v) {
		Intent activityIntent = new Intent(this, Treasurer.class);
		startActivity(activityIntent);
		finish();
	}

	public void showAuditor(View v) {
		Intent activityIntent = new Intent(this, Auditor.class);
		startActivity(activityIntent);
		finish();
	}

	public void showPIO(View v) {
		Intent activityIntent = new Intent(this, PIO.class);
		startActivity(activityIntent);
		finish();
	}

	public void showPeaceOfficer(View v) {
		Intent activityIntent = new Intent(this, Peace_Officer.class);
		startActivity(activityIntent);
		finish();
	}

	public void showGradeRep(View v) {
		Intent activityIntent = new Intent(this, Grade_Rep.class);
		startActivity(activityIntent);
		finish();
	}

	public void showVoteStraight(View v) {
		Intent activityIntent = new Intent(this, Vote_Straight.class);
		startActivity(activityIntent);
		finish();
	}

	public void submit(View v) {

		viewSummary.setTitle("Vote Summary");
		viewSummary.setMessage("President: "      + "\n" + president        + "\n\n" + 
								"Vice-President: "+ "\n" + vice_president   + "\n\n" + 
								"Secretary: "     + "\n" + secretary        + "\n\n" + 
								"Treasurer: "     + "\n" + treasurer  		+ "\n\n" + 
								"Auditor: "       + "\n" + auditor 			+ "\n\n" + 
								"PIO: "           + "\n" + piof  			+ "\n\n" + 
								"Peace Officer :" + "\n" + peace_officer  	+ "\n\n" + 
								"Grade Representative: "+ "\n" + grade_reps + "\n"
								+ "\n");
		viewSummary.setPositiveButton("OK",
				new DialogInterface.OnClickListener() {

					@Override
					public void onClick(DialogInterface dialog, int which) {
						// TODO Auto-generated method stub
						/*
						 * Toast toast = Toast.makeText(Vote.this, president +
						 * grade_rep + treasurer, Toast.LENGTH_SHORT);
						 * toast.setGravity(Gravity.CENTER, 0, 0); toast.show();
						 */

						//
						new PostComment().execute();

						//
						moveToMain=true;
						
					}
				});
		viewSummary.setNegativeButton("Cancel",
				new DialogInterface.OnClickListener() {

					@Override
					public void onClick(DialogInterface dialog, int which) {
						// TODO Auto-generated method stub
						dialog.dismiss();
					}
				});
		viewSummary.show();
	}

	class PostComment extends AsyncTask<String, String, String> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(Vote.this);
			pDialog.setMessage("Submitting Votes...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		@Override
		protected String doInBackground(String... args) {
			// TODO Auto-generated method stub
			// Check for success tag
			int success;

			// We need to change this:

			try {
				// Building Parameters
				List<NameValuePair> params = new ArrayList<NameValuePair>();
				params.add(new BasicNameValuePair("voterId", voterID));
				params.add(new BasicNameValuePair("presidentId", presidentID));
				params.add(new BasicNameValuePair("vice_presidentId",
						vice_presidentID));
				params.add(new BasicNameValuePair("secretaryId", secretaryID));
				params.add(new BasicNameValuePair("treasurerId", treasurerID));
				params.add(new BasicNameValuePair("auditorId", auditorID));
				params.add(new BasicNameValuePair("pioId", pioID));
				params.add(new BasicNameValuePair("peace_officerId",
						peace_officerID));
				params.add(new BasicNameValuePair("gradeId", grade_repID));

				Log.d("request!", "starting");

				// Posting user data to script
				JSONParser jsonParser = new JSONParser();
				JSONObject json = jsonParser.makeHttpRequest(SUBMIT_URL,
						"POST", params);

				// full json response
				Log.d("Submitting your Votes...", json.toString());

				// json success element
				success = json.getInt(TAG_SUCCESS);
				if (success == 1) {
					Log.d("You Submitted your Vote!", json.toString());
					finish();
					return json.getString(TAG_MESSAGE);
				} else {
					Log.d("Vote Failed!", json.getString(TAG_MESSAGE));
					return json.getString(TAG_MESSAGE);

				}
			} catch (JSONException e) {
				e.printStackTrace();
			}

			return null;

		}

		protected void onPostExecute(String file_url) {
			// dismiss the dialog once product deleted
			pDialog.dismiss();
			if (file_url != null) {
				if(moveToMain){
				Toast.makeText(Vote.this, file_url, Toast.LENGTH_LONG).show();
				Intent activityIntent = new Intent(Vote.this, Main.class);
				startActivity(activityIntent);
				finish();
				}
			}

		}

	}

	@Override
	public void onBackPressed() {
		if (doubleBackToExitPressedOnce) {
			super.onBackPressed();
			Intent activityIntent = new Intent(this, Main.class);
			startActivity(activityIntent);
			finish();
		}

		this.doubleBackToExitPressedOnce = true;
		Toast toast = Toast.makeText(Vote.this,
				"Please click Back again to back", Toast.LENGTH_SHORT);
		toast.setGravity(Gravity.CENTER, 0, 0);
		toast.show();
		new Handler().postDelayed(new Runnable() {

			@Override
			public void run() {
				doubleBackToExitPressedOnce = false;
			}
		}, 2000);
	}

}
