"use client";

import Image from "next/image";
import { Card, Dropdown } from "react-bootstrap";
import { useState } from "react";

// Sample dynamic data for suggested users
const recentInstagramFollowersData = [
  {
    id: 1,
    name: "Mason Lee",
    profileImage: "/images/user-118.png",
  },
  {
    id: 2,
    name: "Mia Patel",
    profileImage: "/images/user-119.png",
  },
  {
    id: 3,
    name: "James Nguyen",
    profileImage: "/images/user-120.png",
  },
  {
    id: 4,
    name: "Benjamin Kim",
    profileImage: "/images/user-121.png",
  },
  {
    id: 5,
    name: "Elijah Watson",
    profileImage: "/images/user-122.png",
  },
  {
    id: 6,
    name: "Daniel Flores",
    profileImage: "/images/user-123.png",
  },
];

const RecentInstagramFollowers = () => {
  const [visibleFormId, setVisibleFormId] = useState(null);

  const toggleMessageForm = (userId) => {
    setVisibleFormId((prevId) => (prevId === userId ? null : userId));
  };

  return (
    <>
      <style>
        {`
        .search-input::placeholder {
          font-size: 12px; /* Set placeholder font size to 10 pixels */
        }
      `}
      </style>

      <Card className="custom-shadow rounded-3 bg-white border mb-4 pb-3">
        <div className="d-flex justify-content-between align-items-center gap-1 mb-3 mb-lg-4 p-4 pb-0">
          <div>
            <h3 className="mb-0 fs-20 fw-semibold">
              Recent Instagram Followers
            </h3>
            <span className="fw-normal fs-14" style={{ color: "#8695aa" }}>
              Check out your latest followers
            </span>
          </div>

          <Dropdown className="action-opt -right-10">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="bg-transparent p-0"
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

        <div>
          {recentInstagramFollowersData.map((follower) => (
            <div
              key={follower.id}
              className="lcbmp-none d-flex gap-1 justify-content-between align-items-center px-3 px-sm-4 border-bottom"
              style={{
                paddingBottom: "11.6px",
                marginBottom: "11.6px",
              }}
            >
              <div className="d-flex align-items-center gap-2">
                <div className="flex-shrink-0">
                  <Image
                    src={follower.profileImage}
                    className="rounded-circle"
                    alt={follower.name}
                    width={34}
                    height={34}
                  />
                </div>
                <div className="flex-grow-1">
                  <h4 className="fs-14 fw-medium mb-0">{follower.name}</h4>
                </div>
              </div>

              <div className="d-flex gap-1 gap-sm-2 align-items-center">
                <button
                  className="d-inline-block border-0 rounded-1 text-primary-50 hover-bg fs-12 lh-1"
                  style={{
                    padding: "6.5px 10px",
                    backgroundColor: "#ECF0FF",
                  }}
                >
                  Follow Back
                </button>

                <div className="position-relative">
                  <div
                    onClick={() => toggleMessageForm(follower.id)}
                    style={{ cursor: "pointer" }}
                  >
                    <i
                      className={`${
                        visibleFormId === follower.id
                          ? "ri-close-line text-danger"
                          : "ri-message-2-line text-primary-div-50"
                      } d-inline-block border-0 rounded-1 fs-18`}
                      style={{
                        width: "24px",
                        height: "24px",
                        lineHeight: "24px",
                        textAlign: "center",
                        backgroundColor: "#F3E8FF",
                      }}
                    ></i>
                  </div>

                  {visibleFormId === follower.id && (
                    <div
                      className="position-absolute end-0"
                      style={{ width: "250px" }}
                    >
                      <div className="bg-white p-2 box-shadow rounded-3 position-relative z-1">
                        <form className="position-relative">
                          <input
                            type="text"
                            className="search-input form-control"
                            placeholder={`Message ${follower.name}`}
                            style={{
                              height: "40px",
                              fontSize: "12px",
                            }}
                          />

                          <button
                            className="bg-transparent p-0 border-0 position-absolute top-50 end-0 translate-middle-y pe-3 text-primary"
                            type="button"
                          >
                            <i className="ri-send-plane-2-line"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  )}
                </div>
              </div>
            </div>
          ))}
        </div>
      </Card>
    </>
  );
};

export default RecentInstagramFollowers;
