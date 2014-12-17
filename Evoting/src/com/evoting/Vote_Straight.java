package com.evoting;

import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.AlertDialog;
import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.AdapterView.OnItemClickListener;

public class Vote_Straight extends ListActivity {
	
	AlertDialog.Builder viewMember;

	private boolean isConnected;
	private TextView cName, cID;
	private TextView tvp_pres, tvp_vpres, tvp_sec, tvp_tre, tvp_audit, tvp_pio,
			tvp_po, tvp_gr;
	private TextView tvpid_pres, tvpid_vpres, tvpid_sec, tvpid_tre,
			tvpid_audit, tvpid_pio, tvpid_po, tvpid_gr;
	ImageView submit;

	// Progress Dialog
	private ProgressDialog pDialog;

	private static final String CANDIDATES_URL = "http://192.168.1.225/Electrovots/Android/party_list.php";

	// JSON IDS:
	private static final String TAG_SUCCESS = "success";
	private static final String TAG_PARTYLIST_ALL = "partylist_all";
	private static final String TAG_PARTYLIST_ID = "partylist_id";
	private static final String TAG_PARTYLIST_NAME = "partylist_name";
	private static final String TAG_DESCRIPTION = "description";
	private static final String TAG_PARTYLIST_AB = "partylist_ab";
	private static final String TAG_LOGO = "logo";

	private static final String TAG_P_ID = "p_id";
	private static final String TAG_VP_ID = "vp_id";
	private static final String TAG_S_ID = "s_id";
	private static final String TAG_T_ID = "t_id";
	private static final String TAG_A_ID = "a_id";
	private static final String TAG_PIO_ID = "pio_id";
	private static final String TAG_PO_ID = "po_id";
	private static final String TAG_GR_ID = "gr_id";

	private static final String TAG_P_NAME = "p_name";
	private static final String TAG_VP_NAME = "vp_name";
	private static final String TAG_S_NAME = "s_name";
	private static final String TAG_T_NAME = "t_name";
	private static final String TAG_A_NAME = "a_name";
	private static final String TAG_PIO_NAME = "pio_name";
	private static final String TAG_PO_NAME = "po_name";
	private static final String TAG_GR_NAME = "gr_name";
	// it's important to note that the message is both in the parent branch of
	// our JSON tree that displays a "Candidates Available" or a
	// "No Candidates Available" message,
	// and there is also a message for each individual post, listed under the
	// "posts"
	// category, that displays what the user typed as their message.

	// An array of all of our comments
	private JSONArray mCandidates = null;
	// manages all of our data(candidates) in a list.
	private ArrayList<HashMap<String, Object>> mCandidateList;

	// Storing of data
	SharedPreferences preferences;
	public static final String PrefFile = "Prefs";
	public static final String cVote_Straight = "cVote_Straight";
	public static final String cVote_StraightID = "cVote_StraightID";
	public static final String cVote_StraightSelected = "cVote_StraightSelected";
	public static final String Voter_Year = "Voter_Year";

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

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.position_container);

		preferences = getSharedPreferences("PrefFile", MODE_PRIVATE);
		boolean bvotesrt = preferences.getBoolean(cVote_StraightSelected, false);
		String vote_straight = preferences.getString(cVote_Straight, "None");
		
		viewMember = new AlertDialog.Builder(Vote_Straight.this);
		
		String pres = preferences.getString(cPresident, "None");
		String vpres = preferences.getString(cVice_President, "None");
		String sec = preferences.getString(cSecretary, "None");
		String tre = preferences.getString(cTreasurer, "None");
		String audit = preferences.getString(cAuditor, "None");
		String pio = preferences.getString(cPIO, "None");
		String po = preferences.getString(cPeace_Officer, "None");
		String gr = preferences.getString(cGrade_Rep, "None");
		
		String id_pres = preferences.getString(cPresidentID, "00");
		String id_vpres = preferences.getString(cVice_PresidentID, "00");
		String id_sec = preferences.getString(cSecretaryID, "00");
		String id_tre = preferences.getString(cTreasurerID, "00");
		String id_audit = preferences.getString(cAuditorID, "00");
		String id_pio = preferences.getString(cPIOID, "00");
		String id_po = preferences.getString(cPeace_OfficerID, "00");
		String id_gr = preferences.getString(cGrade_RepID, "00");
		

		cName = (TextView) findViewById(R.id.textViewCanName);
		cID = (TextView) findViewById(R.id.textViewCID);
		submit = (ImageView) findViewById(R.id.msubmit);
		TextView position = (TextView) findViewById(R.id.position);

		tvp_pres = (TextView) findViewById(R.id.TVp_president);
		tvp_vpres = (TextView) findViewById(R.id.TVp_vicepresident);
		tvp_sec = (TextView) findViewById(R.id.TVp_secretary);
		tvp_tre = (TextView) findViewById(R.id.TVp_treasurer);
		tvp_audit = (TextView) findViewById(R.id.TVp_auditor);
		tvp_pio = (TextView) findViewById(R.id.TVp_pio);
		tvp_po = (TextView) findViewById(R.id.TVp_peaceofficer);
		tvp_gr = (TextView) findViewById(R.id.TVp_graderep);

		tvpid_pres = (TextView) findViewById(R.id.TVpid_president);
		tvpid_vpres = (TextView) findViewById(R.id.TVpid_vicepresident);
		tvpid_sec = (TextView) findViewById(R.id.TVpid_secretary);
		tvpid_tre = (TextView) findViewById(R.id.TVpid_treasurer);
		tvpid_audit = (TextView) findViewById(R.id.TVpid_auditor);
		tvpid_pio = (TextView) findViewById(R.id.TVpid_pio);
		tvpid_po = (TextView) findViewById(R.id.TVpid_peaceofficer);
		tvpid_gr = (TextView) findViewById(R.id.TVpid_graderep);

		position.setText("Party List");

		isConnected = true;

		if (bvotesrt) {
			submit.setVisibility(View.VISIBLE);
			cName.setText(vote_straight);
			
			tvp_pres.setText(pres);
			tvp_vpres.setText(vpres);
			tvp_sec.setText(sec);
			tvp_tre.setText(tre);
			tvp_audit.setText(audit);
			tvp_pio.setText(pio);
			tvp_po.setText(po);
			tvp_gr.setText(gr);
			
			tvpid_pres.setText(pres);
			tvpid_vpres.setText(vpres);
			tvpid_sec.setText(sec);
			tvpid_tre.setText(tre);
			tvpid_audit.setText(audit);
			tvpid_pio.setText(pio);
			tvpid_po.setText(po);
			tvpid_gr.setText(gr);
		}
	}

	@Override
	protected void onResume() {
		// TODO Auto-generated method stub
		super.onResume();
		// loading the candidates via AsyncTask
		new LoadComments().execute();
	}

	/**
	 * Retrieves recent data value(candidates) from the server.
	 */
	public void updateJSONdata() {

		// Instantiate the arraylist to contain all the JSON data. we are going
		// to use a bunch of key-value pairs, referring
		// to the json element name, and the content.
		mCandidateList = new ArrayList<HashMap<String, Object>>();

		try {
			// for identifying grade
			String voter_year = preferences.getString(Voter_Year, "0");
			List<NameValuePair> params = new ArrayList<NameValuePair>();
			params.add(new BasicNameValuePair("gradeyear", voter_year));

			JSONParser jParser = new JSONParser();
			JSONObject json = jParser.makeHttpRequest(CANDIDATES_URL, "POST",
					params);

			// mCandidates will tell us how many data (candidates) are available
			mCandidates = json.getJSONArray(TAG_PARTYLIST_ALL);

			// looping through all posts according to the json object returned
			for (int i = 0; i < mCandidates.length(); i++) {
				JSONObject c = mCandidates.getJSONObject(i);

				// gets the content of each tag
				String name = c.getString(TAG_PARTYLIST_NAME);
				String partylist_ab = c.getString(TAG_PARTYLIST_AB);
				String plid = c.getString(TAG_PARTYLIST_ID);
				String description = c.getString(TAG_DESCRIPTION);
				String p_id = c.getString(TAG_P_ID);
				if(p_id.equals("null")){
					p_id="00";
				}
				String vp_id = c.getString(TAG_VP_ID);
				if(vp_id.equals("null")){
					vp_id="00";
				}
				String s_id = c.getString(TAG_S_ID);
				if(s_id.equals("null")){
					s_id="00";
				}
				String t_id = c.getString(TAG_T_ID);
				if(t_id.equals("null")){
					t_id="00";
				}
				String a_id = c.getString(TAG_A_ID);
				if(a_id.equals("null")){
					a_id="00";
				}
				String pio_id = c.getString(TAG_PIO_ID);
				if(pio_id.equals("null")){
					pio_id="00";
				}
				String po_id = c.getString(TAG_PO_ID);
				if(po_id.equals("null")){
					po_id="00";
				}
				String gr_id = c.getString(TAG_GR_ID);
				if(gr_id.equals("null")){
					gr_id="00";
				}
				//
				String p_name = c.getString(TAG_P_NAME);
				if(p_name.equals("null")){
					p_name="--No Candidate--";
				}
				String vp_name = c.getString(TAG_VP_NAME);
				if(vp_name.equals("null")){
					vp_name="--No Candidate--";
				}
				String s_name = c.getString(TAG_S_NAME);
				if(s_name.equals("null")){
					s_name="--No Candidate--";
				}
				String t_name = c.getString(TAG_T_NAME);
				if(t_name.equals("null")){
					t_name="--No Candidate--";
				}
				String a_name = c.getString(TAG_A_NAME);
				if(a_name.equals("null")){
					a_name="--No Candidate--";
				}
				String pio_name = c.getString(TAG_PIO_NAME);
				if(pio_name.equals("null")){
					pio_name="--No Candidate--";
				}
				String po_name = c.getString(TAG_PO_NAME);
				if(po_name.equals("null")){
					po_name="--No Candidate--";
				}
				String gr_name = c.getString(TAG_GR_NAME);
				if(gr_name.equals("null")){
					gr_name="--No Candidate--";
				}
				// String photo = c.getString(TAG_PHOTO);
				String photoURL = "http://192.168.1.225/Electrovots" + c.getString(TAG_LOGO);
				URL uPhoto = new URL(photoURL);

				Bitmap bitmap = BitmapFactory.decodeStream(uPhoto.openStream());

				// creating new HashMap
				HashMap<String, Object> map = new HashMap<String, Object>();

				map.put(TAG_PARTYLIST_NAME, name);
				map.put(TAG_PARTYLIST_AB, partylist_ab);
				map.put(TAG_PARTYLIST_ID, plid);
				map.put(TAG_DESCRIPTION, description);
				
				map.put(TAG_P_ID, p_id);
				map.put(TAG_VP_ID, vp_id);
				map.put(TAG_S_ID, s_id);
				map.put(TAG_T_ID, t_id);
				map.put(TAG_A_ID, a_id);
				map.put(TAG_PIO_ID, pio_id);
				map.put(TAG_PO_ID, po_id);
				map.put(TAG_GR_ID, gr_id);
				//
				map.put(TAG_P_NAME, p_name);
				map.put(TAG_VP_NAME, vp_name);
				map.put(TAG_S_NAME, s_name);
				map.put(TAG_T_NAME, t_name);
				map.put(TAG_A_NAME, a_name);
				map.put(TAG_PIO_NAME, pio_name);
				map.put(TAG_PO_NAME, po_name);
				map.put(TAG_GR_NAME, gr_name);
				map.put(TAG_LOGO, bitmap);

				// adding HashList to ArrayList
				mCandidateList.add(map);

				// our JSON data is up to date same with our arraylist
			}

		} catch (JSONException e) {
			isConnected = false;
			e.printStackTrace();
		} catch (MalformedURLException e) {
			// TODO Auto-generated catch block
			isConnected = false;
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			isConnected = false;
			e.printStackTrace();
		}
	}

	/**
	 * Inserts the parsed data into the listview.
	 */
	private void updateList() {

		// For a ListActivity we need to set the List Adapter, and in order to
		// do
		// that, we need to create a ListAdapter. This SimpleAdapter,
		// will utilize our updated Hashmapped ArrayList,
		// use our vote_content xml template for each item in our list,
		// and place the appropriate info from the list to the
		// correct GUI id. Order is important here.
		SimpleAdapter adapter = new SimpleAdapter(Vote_Straight.this,
				mCandidateList, R.layout.vote_straight_content, new String[] {
						TAG_LOGO, TAG_PARTYLIST_AB, TAG_PARTYLIST_NAME,
						TAG_PARTYLIST_ID,

						TAG_P_NAME, TAG_VP_NAME, TAG_S_NAME, TAG_T_NAME,
						TAG_A_NAME, TAG_PIO_NAME, TAG_PO_NAME, TAG_GR_NAME,

						TAG_P_ID, TAG_VP_ID, TAG_S_ID, TAG_T_ID, TAG_A_ID,
						TAG_PIO_ID, TAG_PO_ID, TAG_GR_ID }, new int[] {
						R.id.imageViewpl, R.id.plname_ab, R.id.plname,
						R.id.plid,

						R.id.p_president, R.id.p_vicepresident,
						R.id.p_secretary, R.id.p_treasurer, R.id.p_auditor,
						R.id.p_pio, R.id.p_peaceofficer, R.id.p_graderep,

						R.id.pid_president, R.id.pid_vicepresident,
						R.id.pid_secretary, R.id.pid_treasurer,
						R.id.pid_auditor, R.id.pid_pio, R.id.pid_peaceofficer,
						R.id.pid_graderep });

		// I shouldn't have to comment on this one:
		adapter.setViewBinder(new MyViewBinder());
		setListAdapter(adapter);

		ListView lv = getListView();
		lv.setOnItemClickListener(new OnItemClickListener() {

			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {

				TextView name = (TextView) view.findViewById(R.id.plname_ab);
				TextView plid = (TextView) view.findViewById(R.id.plid);

				TextView p_pres = (TextView) view
						.findViewById(R.id.p_president);
				TextView p_vicepres = (TextView) view
						.findViewById(R.id.p_vicepresident);
				TextView p_secretary = (TextView) view
						.findViewById(R.id.p_secretary);
				TextView p_treasurer = (TextView) view
						.findViewById(R.id.p_treasurer);
				TextView p_auditor = (TextView) view
						.findViewById(R.id.p_auditor);
				TextView p_pio = (TextView) view.findViewById(R.id.p_pio);
				TextView p_peaceofficer = (TextView) view
						.findViewById(R.id.p_peaceofficer);
				TextView p_graderep = (TextView) view
						.findViewById(R.id.p_graderep);

				TextView pid_pres = (TextView) view
						.findViewById(R.id.pid_president);
				TextView pid_vicepres = (TextView) view
						.findViewById(R.id.pid_vicepresident);
				TextView pid_secretary = (TextView) view
						.findViewById(R.id.pid_secretary);
				TextView pid_treasurer = (TextView) view
						.findViewById(R.id.pid_treasurer);
				TextView pid_auditor = (TextView) view
						.findViewById(R.id.pid_auditor);
				TextView pid_pio = (TextView) view.findViewById(R.id.pid_pio);
				TextView pid_peaceofficer = (TextView) view
						.findViewById(R.id.pid_peaceofficer);
				TextView pid_graderep = (TextView) view
						.findViewById(R.id.pid_graderep);
				
				viewMember.setTitle("Vote Members");
				viewMember.setMessage("President: "+ "\n"  + p_pres.getText().toString() + "\n\n" + 
									"Vice-President: "+ "\n"  + p_vicepres.getText().toString() + "\n\n" + 
									"Secretary: "+ "\n"  + p_secretary.getText().toString() + "\n\n" + 
									"Treasurer: "+ "\n"  + p_treasurer.getText().toString() + "\n\n" + 
									"Auditor: "+ "\n"  + p_auditor.getText().toString() + "\n\n" + 
									"PIO: " + "\n" + p_pio.getText().toString() +  "\n\n" + 
									"Peace Officer: "+ "\n" + p_peaceofficer.getText().toString() + "\n\n"+ 
									"Grade Representative: "+ "\n"  + p_graderep.getText().toString() + "\n");
				viewMember.setPositiveButton("OK", new DialogInterface.OnClickListener() {
					
					@Override
					public void onClick(DialogInterface dialog, int which) {
						// TODO Auto-generated method stub
						submit.setVisibility(View.VISIBLE);
						dialog.dismiss();
					}
				});
				viewMember.show();

				cName.setText(name.getText().toString());
				tvp_pres.setText(p_pres.getText().toString());
				tvp_vpres.setText(p_vicepres.getText().toString());
				tvp_sec.setText(p_secretary.getText().toString());
				tvp_tre.setText(p_treasurer.getText().toString());
				tvp_audit.setText(p_auditor.getText().toString());
				tvp_pio.setText(p_pio.getText().toString());
				tvp_po.setText(p_peaceofficer.getText().toString());
				tvp_gr.setText(p_graderep.getText().toString());

				tvpid_pres.setText(pid_pres.getText().toString());
				tvpid_vpres.setText(pid_vicepres.getText().toString());
				tvpid_sec.setText(pid_secretary.getText().toString());
				tvpid_tre.setText(pid_treasurer.getText().toString());
				tvpid_audit.setText(pid_auditor.getText().toString());
				tvpid_pio.setText(pid_pio.getText().toString());
				tvpid_po.setText(pid_peaceofficer.getText().toString());
				tvpid_gr.setText(pid_graderep.getText().toString());
				
				// This is for testing
				/*
				 * Toast toast = Toast.makeText(Vice_President.this,
				 * "hello"+name.getText().toString()+cid.getText().toString(),
				 * Toast.LENGTH_SHORT); toast.setGravity(Gravity.CENTER, 0, 0);
				 * toast.show();
				 */
			}
		});
	}

	public class LoadComments extends AsyncTask<Void, Void, Boolean> {

		@Override
		protected void onPreExecute() {
			super.onPreExecute();
			pDialog = new ProgressDialog(Vote_Straight.this);
			pDialog.setMessage("Loading PartyList...");
			pDialog.setIndeterminate(false);
			pDialog.setCancelable(true);
			pDialog.show();
		}

		@Override
		protected Boolean doInBackground(Void... arg0) {
			updateJSONdata();
			return null;
		}

		@Override
		protected void onPostExecute(Boolean result) {
			super.onPostExecute(result);
			pDialog.dismiss();
			if (isConnected == false) {
				Toast toast = Toast.makeText(Vote_Straight.this,
						"Cannot connect to Server!", Toast.LENGTH_LONG);
				toast.setGravity(Gravity.CENTER, 0, 0);
				toast.show();
			} else {
				updateList();
			}
		}
	}

	public void submit(View v) {

		SharedPreferences.Editor edit = preferences.edit();
		edit.putString(cVote_Straight, cName.getText().toString());
		edit.putString(cVote_StraightID, cID.getText().toString());
		edit.putBoolean(cVote_StraightSelected, true);

		edit.putString(cPresident, tvp_pres.getText().toString());
		edit.putString(cVice_President, tvp_vpres.getText().toString());
		edit.putString(cSecretary, tvp_sec.getText().toString());
		edit.putString(cTreasurer, tvp_tre.getText().toString());
		edit.putString(cAuditor, tvp_audit.getText().toString());
		edit.putString(cPIO, tvp_pio.getText().toString());
		edit.putString(cPeace_Officer, tvp_po.getText().toString());
		edit.putString(cGrade_Rep, tvp_gr.getText().toString());

		edit.putString(cPresidentID, tvpid_pres.getText().toString());
		edit.putString(cVice_PresidentID, tvpid_vpres.getText().toString());
		edit.putString(cSecretaryID, tvpid_sec.getText().toString());
		edit.putString(cTreasurerID, tvpid_tre.getText().toString());
		edit.putString(cAuditorID, tvpid_audit.getText().toString());
		edit.putString(cPIOID, tvpid_pio.getText().toString());
		edit.putString(cPeace_OfficerID, tvpid_po.getText().toString());
		edit.putString(cGrade_RepID, tvpid_gr.getText().toString());
		
		if(tvp_pres.getText().toString().equals("None") || 
			tvp_pres.getText().toString().equals("null") || 
			tvp_pres.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cPresidentSelected, false);
		}
		else{
			edit.putBoolean(cPresidentSelected, true);
		}
		
		if(tvp_vpres.getText().toString().equals("None") || 
			tvp_vpres.getText().toString().equals("null")|| 
			tvp_vpres.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cVice_PresidentSelected, false);
		}
		else{
			edit.putBoolean(cVice_PresidentSelected, true);
		}
		
		if(tvp_sec.getText().toString().equals("None") || 
			tvp_sec.getText().toString().equals("null") || 
			tvp_sec.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cSecretarySelected, false);
		}
		else{
			edit.putBoolean(cSecretarySelected, true);
		}
		
		if(tvp_tre.getText().toString().equals("None") || 
			tvp_tre.getText().toString().equals("null")|| 
			tvp_tre.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cTreasurerSelected, false);
		}
		else{
			edit.putBoolean(cTreasurerSelected, true);
		}
		
		if(tvp_audit.getText().toString().equals("None") || 
			tvp_audit.getText().toString().equals("null")|| 
			tvp_audit.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cAuditorSelected, false);
		}
		else{
			edit.putBoolean(cAuditorSelected, true);
		}
		
		if(tvp_pio.getText().toString().equals("None") || 
			tvp_pio.getText().toString().equals("null")|| 
			tvp_pio.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cPIOSelected, false);
		}
		else{
			edit.putBoolean(cPIOSelected, true);
		}
		
		if(tvp_po.getText().toString().equals("None") || 
			tvp_po.getText().toString().equals("null")|| 
			tvp_po.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cPeace_OfficerSelected, false);	
		}
		else{
			edit.putBoolean(cPeace_OfficerSelected, true);	
		}
		
		if(tvp_gr.getText().toString().equals("None") || 
			tvp_gr.getText().toString().equals("null")|| 
			tvp_gr.getText().toString().equals("--No Candidate--")){
			edit.putBoolean(cGrade_RepSelected, false);
		}
		else{
			edit.putBoolean(cGrade_RepSelected, true);
		}

		edit.commit();
		String a = preferences.getString("cVote_Straight", ""); 
		String b = preferences.getString("cVote_StraightID", "");
		boolean c = preferences.getBoolean("cVote_StraightSelected", true);

		Intent activityIntent = new Intent(this, Vote.class);
		startActivity(activityIntent);
		finish();

		// This is for testing
		/*
		 * Toast toast = Toast.makeText(Vice_President.this, c+"yow",
		 * Toast.LENGTH_SHORT); toast.setGravity(Gravity.CENTER, 0, 0);
		 * toast.show();
		 */
	}

	@Override
	public void onBackPressed() {
		Intent activityIntent = new Intent(this, Vote.class);
		startActivity(activityIntent);
		finish();
	}
}
