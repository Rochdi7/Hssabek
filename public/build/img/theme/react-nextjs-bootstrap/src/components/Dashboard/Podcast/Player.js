"use client";

import React, { useRef, useState, useEffect } from "react";
import Image from "next/image";

const Player = () => {
  const [isPlaying, setIsPlaying] = useState(false);
  const [currentTime, setCurrentTime] = useState("0:00");
  const [duration, setDuration] = useState("0:00");
  const [progress, setProgress] = useState(0);

  const audioRef = useRef(null);

  useEffect(() => {
    const audio = audioRef.current;

    const updateTime = () => {
      setCurrentTime(formatTime(audio.currentTime));
      setProgress((audio.currentTime / audio.duration) * 100);
    };

    const setAudioDuration = () => {
      setDuration(formatTime(audio.duration));
    };

    audio.addEventListener("timeupdate", updateTime);
    audio.addEventListener("loadedmetadata", setAudioDuration);

    return () => {
      audio.removeEventListener("timeupdate", updateTime);
      audio.removeEventListener("loadedmetadata", setAudioDuration);
    };
  }, []);

  const formatTime = (time) => {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
  };

  const togglePlay = () => {
    if (audioRef.current.paused) {
      audioRef.current.play();
      setIsPlaying(true);
    } else {
      audioRef.current.pause();
      setIsPlaying(false);
    }
  };

  const restartAudio = () => {
    audioRef.current.currentTime = 0;
    audioRef.current.play();
    setIsPlaying(true);
  };

  return (
    <div className="card custom-shadow rounded-3 bg-white border mb-4 custom-padding-30 pb-4">
      <div
        className="d-flex justify-content-between align-items-center flex-wrap gap-3 position-relative mb-3"
        style={{ top: "-5px" }}
      >
        <h3 className="mb-0 fs-18 fw-semibold">Player</h3>
      </div>

      <div style={{ marginBottom: "20px" }}>
        <Image
          src="/images/player.png"
          className="rounded-3 d-lg-none w-100"
          alt="player"
          width={888}
          height={600}
        />
        <div
          className="bg-img rounded-3 d-none d-lg-block"
          style={{
            backgroundImage: "url(/images/player.png)",
            height: "201px",
          }}
        ></div>
      </div>

      <div
        className="d-flex justify-content-between align-items-center"
        style={{ marginBottom: "20px" }}
      >
        <div>
          <h4 className="fs-14 fw-medium text-secondary mb-0">
            Building an Online Presence
          </h4>
          <span className="fs-12">Ethan Cooper</span>
        </div>
        <button className="favorite-button border-0 text-body-color-60 fs-14 bg-transparent p-0">
          <span className="favorite-icon position-relative">
            <i className="ri-heart-line fs-20"></i>
            <i className="ri-heart-fill fs-20 position-absolute top-50 start-50 translate-middle text-primary"></i>
          </span>
        </button>
      </div>

      <div className="audio-player" id="audio_control">
        <div className="d-flex justify-content-between align-items-center mb-2">
          <span className="fs-12">{currentTime}</span>
          <span className="fs-12">{duration}</span>
        </div>

        <div className="progress mb-3" style={{ height: "4px" }}>
          <div
            className="progress-bar"
            style={{ width: `${progress}%`, height: "4px" }}
          ></div>
        </div>

        <div className="d-flex justify-content-between align-items-center">
          <button
            className="bg-transparent p-0 lh-1 border-0"
            style={{ color: "#9CAAFF" }}
          >
            <i className="ri-shuffle-line fs-20"></i>
          </button>
          <div className="d-flex gap-1">
            <button
              className="bg-transparent p-0 lh-1 border-0"
              style={{ color: "#9CAAFF" }}
            >
              <i className="ri-skip-left-fill fs-30"></i>
            </button>
            <button
              className="bg-transparent p-0 lh-1 border-0"
              style={{ color: "#9CAAFF" }}
            >
              <i className="ri-arrow-left-s-fill fs-30"></i>
            </button>
            <button
              className="p-0 lh-1 border-0 text-primary rounded-circle"
              style={{
                backgroundColor: "#ECF0FF",
                width: "44px",
                height: "44px",
              }}
              onClick={togglePlay}
            >
              <i
                className={
                  isPlaying ? "ri-pause-fill fs-30" : "ri-play-fill fs-30"
                }
              ></i>
            </button>
            <button
              className="bg-transparent p-0 lh-1 border-0"
              style={{ color: "#9CAAFF" }}
            >
              <i className="ri-arrow-right-s-fill fs-30"></i>
            </button>
            <button
              className="bg-transparent p-0 lh-1 border-0"
              style={{ color: "#9CAAFF" }}
            >
              <i className="ri-skip-right-fill fs-30"></i>
            </button>
          </div>
          <button
            className="bg-transparent p-0 lh-1 border-0"
            style={{ color: "#9CAAFF" }}
            onClick={restartAudio}
          >
            <i className="ri-reset-right-line fs-20"></i>
          </button>
        </div>
      </div>

      <audio ref={audioRef} src="https://cldup.com/qR72ozoaiQ.mp3"></audio>
    </div>
  );
};

export default Player;
