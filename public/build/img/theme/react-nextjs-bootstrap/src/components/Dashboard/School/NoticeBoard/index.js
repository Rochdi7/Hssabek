"use client";

import Link from "next/link";
import Image from "next/image";
import { Card } from "react-bootstrap";

// Sample dynamic data for the notices
const notices = [
  {
    id: 1,
    title: "Science Fair Registration",
    description: "Registration for the annual Science Fair",
    date: "October 28, 2024",
    icon: "/images/notice-board-icon-1.svg",
    color: "bg-primary-div",
  },
  {
    id: 2,
    title: "Parent-Teacher Meeting",
    description: "The Parent-Teacher meeting for Term 1 will take place",
    date: "November 1, 2024",
    icon: "/images/notice-board-icon-2.svg",
    color: "bg-primary",
  },
  {
    id: 3,
    title: "Winter Sports Tryouts",
    description: "Tryouts for the winter sports teams will begin on",
    date: "November 12, 2024",
    icon: "/images/notice-board-icon-3.svg",
    color: "bg-danger",
  },
  {
    id: 4,
    title: "School Holiday Reminder",
    description: "A reminder that school will be closed on November",
    date: "November 28, 2024",
    icon: "/images/notice-board-icon-4.svg",
    color: "bg-primary",
  },
];

const NoticeBoard = () => {
  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30">
          <h3 className="mb-0">Notice Board</h3>

          <button type="button" className="btn p-0 text-decoration-none">
            <span>View All</span>
            <i className="ri-arrow-right-s-line fs-18 position-relative top-1"></i>
          </button>
        </div>

        {/* Loop through the notices array */}
        {notices.slice(0,4).map((notice) => (
          <div
            key={notice.id}
            className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom school-nb"
          >
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div
                  className={`text-center ${notice.color} rounded-circle`}
                  style={{ width: "40px", height: "40px", lineHeight: "40px" }}
                >
                  <Image
                    src={notice.icon}
                    alt="notice-board-icon"
                    width={22}
                    height={22}
                  />
                </div>
              </div>
              <div className="flex-grow-1 ms-3">
                <h4 className="fs-14 fw-medium mb-0">{notice.title}</h4>
                <p className="fs-12 mb-0">{notice.description}</p>
                <div className="d-flex align-items-center">
                  <i className="ri-calendar-line text-primary"></i>
                  <span className="fw-medium fs-12 text-primary ms-1">
                    {notice.date}
                  </span>
                </div>
              </div>
            </div>

            <Link
              href="#"
              className="rounded-circle d-inline-block text-center fs-18 hover-bg for-dark-read text-decoration-none border"
              style={{ width: "43px", height: "43px", lineHeight: "42px" }}
            >
              <i className="ri-arrow-right-up-line fs-18"></i>
            </Link>
          </div>
        ))}
      </Card>
    </>
  );
};

export default NoticeBoard;
