"use client";

import React from "react";
import { Dropdown } from "react-bootstrap";
import Image from "next/image";

const episodesData = [
  {
    id: 1,
    title: "AI for Content Strategy",
    host: "Amanda Garcia",
    date: "October 20, 2024",
    icon: "/images/notice-board-icon-1.svg",
    bgColor: "bg-primary-div",
  },
  {
    id: 2,
    title: "Secrets to Viral Marketing",
    host: "Sarah Johnson",
    date: "October 25, 2024",
    icon: "/images/notice-board-icon-2.svg",
    bgColor: "bg-primary",
  },
  {
    id: 3,
    title: "Social Media Strategy",
    host: "David Chen",
    date: "October 28, 2024",
    icon: "/images/notice-board-icon-3.svg",
    bgColor: "bg-danger",
  },
  {
    id: 4,
    title: "Content Trends for 2025",
    host: "Tom Richards",
    date: "November 3, 2024",
    icon: "/images/notice-board-icon-4.svg",
    bgColor: "bg-card-bg-c",
  },
];

const UpcomingEpisodes = () => {
  return (
    <>
      <div className="card custom-shadow rounded-3 bg-white border mb-4 pb-4">
        <div
          className="d-flex justify-content-between align-items-center gap-2 position-relative custom-padding-30"
          style={{
            top: "-5px",
            paddingBottom: "18px",
          }}
        >
          <h3 className="mb-0 fs-18 fw-semibold">Upcoming Episodes</h3>

          <Dropdown className="action-opt -right-10">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="bg-transparent p-0 lh-1"
            >
              <i className="material-symbols-outlined">more_vert</i>
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">schedule</i>
                Today
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">pie_chart</i>
                Last 7 Days
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">refresh</i>
                Last Month
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">calendar_today</i>
                Last 1 Year
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">bar_chart</i>
                All Time
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">visibility</i>
                View
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">delete</i>
                Delete
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="last-child-none">
          {episodesData.map((episode) => (
            <div
              key={episode.id}
              className="d-flex gap-2 justify-content-between align-items-center border-bottom border-body-bg custom-padding-30 pt-0 child"
              style={{ marginBottom: "13.5px", paddingBottom: "13.5px" }}
            >
              <div className="d-flex">
                <div className="flex-shrink-0">
                  <div
                    className={`text-center ${episode.bgColor} rounded-circle`}
                    style={{
                      width: "40px",
                      height: "40px",
                      lineHeight: "40px",
                    }}
                  >
                    <Image
                      src={episode.icon}
                      alt="notice-board-icon"
                      width={24}
                      height={24}
                    />
                  </div>
                </div>
                <div className="flex-grow-1 ms-10">
                  <h4 className="fs-14 fw-medium mb-0">{episode.title}</h4>
                  <p className="fs-12 mb-0">{episode.host}</p>
                  <div className="d-flex align-items-center">
                    <i className="ri-calendar-line text-primary"></i>
                    <span className="fw-medium fs-12 text-primary ms-1">
                      {episode.date}
                    </span>
                  </div>
                </div>
              </div>
              <button
                className="rounded-circle d-inline-block text-center hover-bg for-dark-read text-decoration-none border bg-transparent"
                style={{
                  width: "43px",
                  height: "43px",
                  lineHeight: "42px",
                  color: "#B1BBC8",
                }}
              >
                <i className="ri-arrow-right-up-line fs-24"></i>
              </button>
            </div>
          ))}
        </div>
      </div>
    </>
  );
};

export default UpcomingEpisodes;
