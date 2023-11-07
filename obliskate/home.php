<?php include('/obliskate/header.html')?>
<html>
  <!--https://seesparkbox.com/foundry/how_to_code_an_SVG_pie_chart-->
  <!--https://codepen.io/jacobhelton57/post/creating-an-analog-clock-->
  <head>
    <title>Obliskate</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="dark">
    <div id="navBar">
      <div id="title"><h1>Obliskate</h1><h6>By FireyDeath4</h6></div>
      <div id="navLinks"></div>
    </div>
    <div class="margin">
      <div>
        Contrast:
        <select id="scheme" onchange="applyScheme(this.value)">
          <option selected value="sys">System</option>
          <option value="light">Light</option>
          <option value="dark">Dark</option>
        </select>
      </div>
      <div>
        <h6>3 September</h6>
        Just finished the new table<br />
        Now I want to start adding other features
      </div>
      <!--<div><input type="textarea" id="cookieText"/>
      <br><button onclick="checkCookie($('#cookieText').val())">Check cookies</button>
      <button onclick="promptChangeCookie()">Change cookie</button>
      <br><button onclick="addTask()">Add task</button>
      <button onclick="addEvent()">Add event</button>
      <br><button>Refresh cookie display (because why wouldn't it work)</button></div>
      <div id="cookies"></div>-->
      <div><pre id="logger">TEST</pre></div>
    </div>
    <div class="clockPanel">
      <div class="clock"></div>
      <div>
        <input type="range" min="1" max="60" value="15" id="update"
          onchange="changeFPS(this.value)"/>
        <label for="update">15 FPS</label><br/>
        <input type="checkbox" id="sticky"
          onclick="toggleStickyClock(this.checked)">
        <label for="sticky">Sticky clocks</label>
      </div>
    </div>
    <div class="margin">
      <div id="taskAdd">
        <div>
          <button id="saveTask" onclick="addTask($('#taskName').val());">
            Add to list
          </button>
        </div>
        <input type="textarea" id="taskName" />
      </div>
      <div class="tableWrap">
        <table id="taskTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Task</th>
              <th>Dependencies</th>
              <th>Start date</th>
              <th>Expiry date</th>
              <th>Priority</th>
              <th>Impact</th>
              <th>Urgency</th>
              <th>Difficulty</th>
              <th>Required conditions</th>
              <th>Recommended conditions</th>
              <th>Estimated duration</th>
              <th>Success benefits</th>
              <th>Failure consequences</th>
              <th>Procrastination consequences</th>
              <th>Performance effects</th>
              <th>Next date</th>
              <th>Tags</th>
              <th>Creation date</th>
              <th>UUID</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tableButtons">
        <button title="Move to top" onclick="moveTasks(selectedTasks(),0)">
          ⊼
        </button>
        Move to top
        <button
          title="Move up"
          onclick="short=selectedTasks();if(short[0]>0){moveTasks(short,short[0]-1)}"
        >
          ∧
        </button>
        Move up
        <button title="Clump selected tasks" onclick="clumpTasks(selectedTasks())">
          =
        </button>
        Clump
        <button
          title="Move down"
          onclick="short=selectedTasks();if(short[short.length-1]<user.tasks.length-1){moveTasks(short,(1*short[0])+1)}"
        >
          ∨
        </button>
        Move down
        <button
          title="Move to bottom"
          onclick="short=selectedTasks();moveTasks(short,user.tasks.length-(short[short.length-1]-short[0])-1)"
        >
          ⊻
        </button>
        Move to bottom
        <button
          title="Delete selected tasks"
          onclick="deleteTasks(selectedTasks())"
        >
          ×
        </button>
        Delete
      </div>
      <h6>Old list, in case you still want to use it</h6>
      <div class="taskEditor">
        <div class="buttons">
          <button onclick="moveTasks($('#taskList').val(),0)">
            Move to top
          </button>
          <button
            onclick="short=$('#taskList').val();if(short[0]>0){moveTasks(short,short[0]-1)}"
          >
            Move up
          </button>
          <button
            onclick="short=$('#taskList').val();if(short[short.length-1]<user.tasks.length-1){moveTasks(short,(1*short[0])+1)}"
          >
            Move down
          </button>
          <button
            onclick="short=$('#taskList').val();moveTasks(short,user.tasks.length-(short[short.length-1]-short[0])-1)"
          >
            Move to bottom
          </button>
          <button onclick="clumpTasks($('#taskList').val())">
            Clump selected
          </button>
          <button onclick="deleteTasks($('#taskList').val())">Delete</button>
        </div>
        <select multiple id="taskList"></select>
      </div>
      <h6>
        If you're going to use this thing even though it's in the middle of
        development, I recommend backing up your local storage frequently by
        saving it to text files
      </h6>
      <h6>
        Also if the system totally changes and your data stops working or gets
        corrupted or something, you'll have to go in the console and mess around
        with it (do <code>localStorage</code> and <code>JSON</code> operations
        and/or see if you can edit the <code>user</code> object) until it works
        :P
      </h6>
      <!--<button>Save user changes</button>
    <button>Revert</button>-->
      <button onclick="$('#dataBox').val(localStorage.user)">
        Display local storage
      </button>
      <button onclick="saveFromInput($('#dataBox').val())">
        Load storage file
      </button>
      <button onclick="clearStoragePrompt()">Reset user data</button><br />
      <textarea style="resize: none" id="dataBox" spellcheck="false"></textarea>
      <div>
        Since this is my site, I may as well advertise my Discord server :P<br />
        (NOTE: you can read and talk about the development at #surgery)<br />
        Invite link:
        <a href="https://discord.gg/UYVyCSsb5T">https://discord.gg/UYVyCSsb5T</a
        ><br />
        Preview link:
        <a href="https://s2js.com/FireyDeath4/discord"
          >https://s2js.com/FireyDeath4/discord</a
        >
      </div>
      <!--This code is worse than YandereDev (probably)-->
      <h2>Current tasks:</h2>
      <ul>
        <li>Implement list cookies for tasks</li>
      </ul>
      <h2>About</h2>
      <p>just you wait</p>
      <p>and if you think this is even finished, get outta here</p>
      <p>I'm gonna make a whole task and timer logging system and everything</p>
      <div>
        <h2>Plans</h2>
        <p>paste</p>
        <h3>Meta</h3>
        <ul>
          <li>Major cross-compatibility</li>
          <li>Potential server hosting</li>
        </ul>
        <h3>Setup</h3>
        <ul>
          <li>Setting ongoing tasks</li>
          <li>Setting tasks with due dates (seperate)</li>
          <li>Setting tasks' priority and predicted difficulty</li>
          <li>Setting repeated tasks for intervals</li>
          <li>Setting ideal conditions for tasks</li>
          <li>
            Setting events (can overlap with timed tasks), average lifespan
            included as default
          </li>
          <li>
            Setting break times (can be overridden by tasks at different
            priorities)
          </li>
          <li>
            Setting facts to remember (can be shown at different intervals)
          </li>
          <li>
            Setting abilities required for tasks (with checkups, e.g. mental
            lucidity, physical energy)
          </li>
          <li>Setting privacy/publicity of profile/individual items</li>
        </ul>
        <h3>Audio</h3>
        <ul>
          <li>
            Auditory clock: Plays intervals at different octaves simultaneously,
            customisable
          </li>
          <li>
            Dynamic music (optional, complex for harder/simpler tasks, more
            layers for important tasks)
          </li>
        </ul>
        <h3>Visual/effective</h3>
        <ul>
          <li>Visual clocks and timers</li>
          <ul>
            <li>
              Underneath boundaries based on schedules such as awakening and
              other events
            </li>
            <li>Interval/event shading/outlining on clocks</li>
            <li>Spiral fade-in on some clocks for significant events</li>
          </ul>
          <li>Productivity advice</li>
          <ol>
            <li>
              rely on other things to give you discipline (such as this program)
              to conserve mental stamina
            </li>
            <li>
              starting is harder than persisting so just push through it
              expecting little to happen
            </li>
            <li>
              do not expect anything to become normal like just don't rely on
              being able to do things you did in the past
            </li>
            <li>
              don't wait to do anything or you'll forget about it and never get
              to it
            </li>
            <li>
              don't wait until you're ready to do things, you pedantic little
              creature
            </li>
          </ol>
          <li>
            Comparison between present and previous events (in case time is
            going too fast for you to properly keep up with it)
          </li>
        </ul>
        <h3>Other</h3>
        <ul>
          <li>Keyboard shortcuts</li>
          <li>Daily/weekly checkup</li>
          <li>Problem input (unexpected event, unproductive state)</li>
          <li>Logs</li>
          <ul>
            <li>Task completion times (speedrun/casual/other)</li>
          </ul>
          <li>Data for impromptu events such as average times</li>
          <li>
            Productivity points, accounts (optional, public/private settings),
            rankings
          </li>
          <li>
            Obscuring information to build self-sustenance (optional,
            customisable)
          </li>
          <li>Forced time to think carefully</li>
        </ul>
        <h3>Design</h3>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="site.js"></script>
    <script src="script.js"></script>
    <script src="navLoader.js"></script>
  </body>
</html>