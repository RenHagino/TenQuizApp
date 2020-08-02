<script>
  Vue.config.devtools = true;
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ title }} <span class="badge badge-success">{{ categoryName }}</span></div>

                    <div class="card-body text-center drill-body">

                        <template v-if="!isStarted && !isCountDown && !isEnded">
                          <p>ボタンを押してスタートしよう！！</p>
                          <button class="btn btn-primary " @click="doDrill" v-if="!isStarted">
                            START
                          </button>
                        </template>
                        
                        <p  v-if="isCountDown" style="font-size: 100px;">{{countDownNum}}</p>

                        <template v-if="isStarted && !isCountDown && !isEnded">
                            <h3>残り時間{{formatTime}}</h3>
                            <div class="row">
                              <h3 class="col-md-12">第{{currentProblemNum + 1}}問</h3>
                              <h3 class="col-md-12 mx-auto">{{problemWords}}</h3>
                            </div>
                            <!--id or name ???-->
                            <div class="row">
                                <span class="col-md-6 mx-auto text-danger">答えは{{answerMethod}}で入力してください</span>
                            </div>
                            <div class="row">
                              <input type="text" class="col-md-8 form-control mx-auto" name="userAnswer" value="" v-model="userAnswer">
                            </div>
                        </template>

                        <!--次の問題へ進むボタン-->
                        <template v-if="isStarted && !isCountDown  && !isEnded && !isStop">
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <button class="btn btn-primary my-2 " @click="nextProblem">
                                  次の問題へ
                                </button>
                              </div>
                            </div>
                        </template>

                        <!--一時停止ボタン-->
                        <template v-if="isStarted && !isCountDown  && !isEnded && !isStop">
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <!-- タイマーのON/OFFによってボタンを切り替える -->
                                <button  class="btn btn-secondary my-2" v-on:click="lessonStop">一時停止</button>
                              </div>
                            </div>
                        </template>

                        <!--レッスン再開ボタン-->
                        <template v-if="isStarted && !isCountDown  && !isEnded && isStop">
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <!-- タイマーのON/OFFによってボタンを切り替える -->
                                <button class="btn btn-primary my-2" v-on:click="lessonRestart" >再開する</button>
                              </div>
                            </div>
                        </template>

                        <template v-if="isEnded">
                            <p>レッスン終了です！！！</p>
                            <p>今回のスコア</p>
                            <p>{{lessonScore}}点 / 1000点中</p>
                          
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <p>今回のレッスンの正解数 : {{correctNum}} / 不正解数 :{{missNum}}</p>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <a href="/drills" class="btn btn-secondary my-3">
                                        レッスン一覧へ
                                    </a>
                                    <button class="btn btn-primary my-3" @click="retryLesson">
                                        再チャレンジ
                                    </button>
                                </div>
                            </div>
                        </template>

                        <template v-if="isFailed">
                            <p>レッスン失敗です。。。</p>
                            <p>わからない問題がある場合は「次へ」ボタンを押してみよう！</p>
                            <p>今回のスコア</p>
                            <p>NO SCORE</p>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
          'title', 'drill', 'categoryName'
        ],
        data: function() {
            return {
                //サンプルタイマー用
                min: 10,
                sec: 1,
                timerObj: null,
                // カウントダウン用
                countDownNum: 5, 
                //現在の問題数、正解数、不正解数
                currentProblemNum: 0, 
                correctNum: 0,
                missNum: 0, 
                //カウントダウン、スタート、ストップ、終了、失敗の各フラグ
                isCountDown: false,
                isStarted: false,
                isStop: false,
                isEnded: false,
                isFailed : false,
            }
        },

        computed: {

            // 問題テキスト（配列形式）
            problemWords: function () {
                return this.drill['problem' + this.currentProblemNum]
            },

            //解答方法
            answerMethod: function() {
                return this.drill['a_method' + this.currentProblemNum]
            },

            // 問題の答え
            problemAnswer: function(){
              return this.drill['answer' + this.currentProblemNum]
            },

            // 問題テキスト（配列形式）
            problemText: function () {
                return Array.from(this.drill['problem' + this.currentProblemNum])
            },

            // レッスンのスコア
            lessonScore: function () {
                return (this.correctNum * 50) - (this.missNum * 25) + (this.timerScore);
            },

            //タイマースコア(残り時間によるスコア)
            timerScore: function(){
              return (this.min * 50) + 50;
            },

            //サンプルタイマー用残り時間
            formatTime: function() {
              let timeStrings = [
                this.min.toString(),
                this.sec.toString()
              ].map(function(str) {
                if (str.length < 2) {
                  return "0" + str
                } else {
                  return str
                }
              })
              return timeStrings[0] + ":" + timeStrings[1]
            }
        },
        
        //================================================
        // = メソッド一覧
        //================================================
        methods: {
          
          //サンプルタイマー用メソッド
          count: function() {
            if(this.isStop === false){
              if (this.sec <= 0 && this.min >= 1) {
                  this.min --;
                  this.sec = 59;
                } else if(this.sec <= 0 && this.min <= 0) {
                  this.complete();
                } else {
                  this.sec --;
                }
            }
          },

          //レッスンスリスタートメソッド
          lessonRestart: function() {
              let self = this;
              this.isStop = false
          },
          
          //レッスン一時停止メソッド todo :テスト
          lessonStop: function() {
              clearInterval(this.timerObj);
              this.isStop = true
          },
          //レッスン完了
          complete: function() {
              clearInterval(this.timerObj)
          }, 
          
          //ドリルスタート
          doDrill: function(){
            this.countDown();
          },

          //5秒カウントダウンメソッド
          countDown: function () {
              //isCountDownをtrueにする
              this.isCountDown = true

              //カウントダウン繰り返し処理
              let timer = window.setInterval(() => {
                this.countDownNum -= 1
                //カウントダウンの秒数が0になると
                if(this.countDownNum <= 0){
                    this.isCountDown = false;
                    this.isStarted = true;
                    this.count();
                    return
                  }
              }, 1000)
              
          },
            
          //次の問題へ
          nextProblem: function(){
              //現在入力されているユーザーの答えと問題の答えが一致した場合、正解数を+1する
              if(this.problemAnswer === this.userAnswer){
                ++this.correctNum;
              }else{
                ++this.missNum;
            }
              //現在の問題が最後の問題の場合、次の問題に行かずに終了する
              if(this.currentProblemNum == 9){
                  console.log('問題を終了します');
                  this.userAnswer ='';
                  this.currentProblemNum = 0;
                  this.isEnded = true;
                  this.lessonStop();
                  clearInterval(this.timerObj);
            }
              //正解数を+1し、間違っている場合は不正解数を+1する
              console.log('次の問題へ進みます!');
              //ユーザーがフォームに入力していた値をリセットする
              this.userAnswer = '';
              //現在の問題数currentProblemNumに+1する
              ++this.currentProblemNum;
          },
            
            //レッスンリトライメソッド
            retryLesson: function(){
                this.isStop = false;
                this.isEnded = false;
                this.isCountDown = true
                this.countDownNum = 5;
                this.currentProblemNum = 0;
                this.correctNum = 0;
                this.missNum= 0;
                this.sec = 0;
                this.min = 10;
                
                window.clearInterval(timer)
                this.formatTime = null;
                clearInterval(this.timerObj)
                this.timerObj = null;
                this.countDown();
            }
        }
    }
</script>