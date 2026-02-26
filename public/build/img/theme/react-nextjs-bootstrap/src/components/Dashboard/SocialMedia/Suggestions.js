"use client";

import Image from "next/image";
import { Card, Dropdown } from "react-bootstrap";

// Sample dynamic data for suggested users
const suggestedUsersData = [
  {
    id: 1,
    name: "Sophia Adams",
    profileImage: "/images/user-113.png",
    mutualFriends: 12,
  },
  {
    id: 2,
    name: "Liam Roberts",
    profileImage: "/images/user-114.png",
    mutualFriends: 8,
  },
  {
    id: 3,
    name: "Olivia Martinez",
    profileImage: "/images/user-115.png",
    mutualFriends: 15,
  },
  {
    id: 4,
    name: "Ethan Clarke",
    profileImage: "/images/user-116.png",
    mutualFriends: 10,
  },
  {
    id: 5,
    name: "Isabella Cruz",
    profileImage: "/images/user-117.png",
    mutualFriends: 7,
  },
];

const Suggestions = () => {
  return (
    <Card className="custom-shadow rounded-3 bg-white border mb-4 pb-3">
      <div className="p-4">
        <div className="d-flex justify-content-between align-items-center gap-1 mb-3 mb-lg-4">
          <div>
            <h3 className="mb-0 fs-20 fw-semibold">Suggestions</h3>
            <span className="fw-normal fs-14" style={{ color: "#8695aa" }}>
              People you may know
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

        <div className="last-child-none">
          {suggestedUsersData.map((user) => (
            <div
              key={user.id}
              className="d-flex justify-content-between align-items-center child mb-20"
            >
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src={user.profileImage}
                    className="rounded-circle"
                    alt={user.name}
                    width={44}
                    height={44}
                  />
                </div>
                <div className="flex-grow-1 ms-10">
                  <h4 className="fs-14 fw-medium mb-0">{user.name}</h4>
                  <span className="fs-12">
                    {user.mutualFriends} mutual friends
                  </span>
                </div>
              </div>

              <div className="d-flex flex-wrap gap-1">
                <button
                  className="bg-transparent p-0 d-inline-block border border-danger rounded-circle text-danger hover-bg-danger border-opacity-50"
                  style={{
                    width: "34px",
                    height: "34px",
                    lineHeight: "32px",
                  }}
                >
                  <i className="ri-delete-bin-7-line fs-16"></i>
                </button>

                <button
                  className="bg-transparent p-0 d-inline-block border border-primary rounded-circle text-primary hover-bg border-opacity-50"
                  style={{
                    width: "34px",
                    height: "34px",
                    lineHeight: "32px",
                  }}
                >
                  <i className="ri-user-add-line fs-16"></i>
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </Card>
  );
};

export default Suggestions;
