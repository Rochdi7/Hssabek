"use client";

import { Card } from "react-bootstrap";

const highlightsData = [
  {
    icon: "ri-star-fill",
    label: "Average Client Rating",
    value: "4.9/5.0",
    trend: "up",
  },
  {
    icon: "ri-instagram-fill",
    label: "Instagram Followers",
    value: "630K",
    trend: "down",
  },
  {
    icon: "ri-facebook-fill",
    label: "Facebook Followers",
    value: "630K",
    trend: "up",
  },
  {
    icon: "ri-google-fill",
    label: "Google Ads CPC",
    value: "$3.58",
    trend: "up",
  },
];

const Highlights = () => {
  return (
    <div
      className="border-0 rounded-3 mb-4 for-dark"
      style={{ backgroundColor: "#EBDCD5" }}
    >
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
          <h3 className="mb-0 text-black">Highlights</h3>
          <span className="fs-12" style={{ color: "#82716F" }}>
            Last 7 days
          </span>
        </div>

        <ul className="ps-0 mb-0 list-unstyled list-last-child">
          {highlightsData.slice(0, 4).map((item, index) => (
            <li
              key={index}
              className="d-flex justify-content-between pb-3 mb-3"
              style={{ borderBottom: "1px solid #E3D1C9" }}
            >
              <div className="d-flex align-items-center">
                <i
                  className={`${item.icon} fs-17`}
                  style={{ color: "#FD5812" }}
                ></i>
                <span className="ms-2" style={{ color: "#82716F" }}>
                  {item.label}
                </span>
              </div>
              <span style={{ color: "#463938" }}>
                <i
                  className={`${
                    item.trend === "up"
                      ? "ri-arrow-up-line text-success"
                      : "ri-arrow-down-line text-danger"
                  } fs-16`}
                ></i>{" "}
                {item.value}
              </span>
            </li>
          ))}
        </ul>
      </Card.Body>
    </div>
  );
};

export default Highlights;
