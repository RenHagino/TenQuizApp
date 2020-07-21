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
                        
                        <templete v-if="isCountDown">
                            <p style="font-size: 100px;">{{countDownNum}}</p>
                        </templete>

                        <template v-if="isStarted && !isCountDown && !isEnded">
                            <h3>制限時間{{timerNum}}秒</h3>
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


                        <template v-if="isStarted && !isCountDown  && !isEnded">
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <button class="btn btn-primary my-3 " @click="nextProblem">
                                  次の問題へ
                                </button>
                              </div>
                            </div>
                        </template>

                        <!--レッスン終了スコア-->
                        <template v-if="!isStarted && isEnded">
                          <p>今回のスコア</p>
                          <p>{{lessonScore}}</p>
                        </template>

                        <template v-if="isEnded">
                            <p>レッスン終了です！！！</p>
                            <p>今回のスコア</p>
                            <p>{{lessonScore}}</p>
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <p>今回のレッスンの正解数 : {{correctNum}}</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 mx-auto">
                                <p>今回のレッスンの不正解数 :{{missNum}}</p>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <button class="btn btn-secondary my-3" @click="retryLesson">
                                        レッスン一覧へ
                                    </button>
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
          'title', 'drill', 'categoryName'],
        data: function() {
            return {
                countDownNum: 5, // カウントダウン用
                timerNum: 300, // タイマー
                correctNum: 0,
                missNum: 0, 
                wpm: 0, 
                isStarted: false,
                isEnded: false,
                isCountDown: false,
                isFailed : false,
                currentProblemNum: 0, 
                userAnswer: ''
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
                return (this.correctNum * 100) - (this.missNum * 15) + (this.timerNum)
                //return (this.correctNum * 10) * (1 - this.missNum / (this.correctNum * 2))
            }
        },
        
        //メソッド一覧
        methods: {

          //ドリルスタート
          doDrill: function(){
            this.isStarted = true
            this.countDown()
          },

          //カウントダウンメソッド
          countDown: function () {
              this.isCountDown = true
                let timer = window.setInterval(() => {
                  this.countDownNum -= 1

                  //カウントダウンの秒数が0になると
                  if(this.countDownNum <= 0){
                      this.isCountDown = false
                      window.clearInterval(timer)
                      this.countTimer()
                      return
                    }

                }, 1000)
          },

            //最初の問題表示メソッド ()
            //showFirstProblem: function () {
//
            //    // 入力イベント時に入力キーと解答キーをチェック
            //    $(window).on('keypress', e => {
            //        console.log(e.which)
            //        if(e.which === this.problemKeyCodes[this.currentWordNum]){
            //            ++this.currentWordNum
            //            ++this.wpm
            //            
            //            // 全文字正解終わったら、次の問題へ
            //            if(this.totalWordNum === this.currentWordNum){
            //                console.log('次の問題へ！')
            //                ++this.currentProblemNum
            //                this.currentWordNum = 0
            //            }
            //        }else{
            //            console.log('不正解です。。。。')
//
            //            this.soundPlay(ngSound)
            //            ++this.missNum
//
            //            console.log('現在回答の文字数目:' + this.currentWordNum)
            //        }
//
            //    })
            //},
            
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
                    window.clearInterval();
                    this.currentProblemNum = 0;
                    this.isEnded = true;
                }

                //正解数を+1し、間違っている場合は不正解数を+1する
                console.log('次の問題へ進みます!');
                //ユーザーがフォームに入力していた値をリセットする
                this.userAnswer = '';
                //現在の問題数currentProblemNumに+1する
                ++this.currentProblemNum;
            },
            

            //残りタイムカウントメソッド
            countTimer: function () {
                let timer = window.setInterval(() => {
                    this.timerNum -= 1

                    if(this.timerNum <= 0){
                        this.isFailed = true
                        window.clearInterval(timer)
                    }
                }, 1000)
            },

            //レッスンリトライメソッド
            retryLesson: function(){
                this.isStarted = false;
                this.isEnded = false;
                this.isCountDown = false;
                this.countDownNum = 5;
                this.currentProblemNum = 0;
            }
        }
    }
</script>