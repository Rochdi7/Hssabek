"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const Profile = ({ userData }) => {
  const { name, title, profilePicture, socialLinks, propertyDetails } =
    userData;

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4 text-center position-relative overflow-hidden">
        <span
          className="bg-danger rounded-top-3 position-absolute z-n1 top-0 d-block w-100"
          style={{ height: "120px" }}
        ></span>
        <Image
          src="/images/shape-9.png"
          className="position-absolute top-0 start-0"
          alt="shape"
          width={64}
          height={66}
        />
        <Card.Body className="px-4 pb-4" style={{ paddingTop: "35px" }}>
          <Image
            src={profilePicture || "/images/user-70.png"}
            className="rounded-circle mb-4"
            alt="user"
            width={160}
            height={160}
          />

          <h3 className="fs-16 mb-0">{name}</h3>
          <span>{title}</span>

          <ul className="ps-0 my-4 list-unstyled d-flex flex-wrap justify-content-center gap-3">
            {socialLinks?.map((link, index) => (
              <li key={index}>
                <a
                  href={link.url}
                  target="_blank"
                  className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                  style={{
                    width: "30px",
                    height: "30px",
                    lineHeight: "30px",
                    backgroundColor: link.backgroundColor,
                  }}
                >
                  <i className={link.iconClass}></i>
                </a>
              </li>
            ))}
          </ul>

          <ul className="ps-0 mb-0 list-unstyled list-last-child">
            {propertyDetails?.map((detail, index) => (
              <li
                className="d-flex justify-content-between align-items-center mb-3"
                key={index}
              >
                <span className="text-secondary">{detail.label}:</span>
                <span>{detail.value}</span>
              </li>
            ))}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

// Sample user data
const userData = {
  name: "Harold Cook",
  title: "Owner",
  profilePicture: "/images/user-70.png",
  socialLinks: [
    {
      url: "https://www.facebook.com/",
      backgroundColor: "#3A559F",
      iconClass: "ri-facebook-fill",
    },
    {
      url: "https://www.twitter.com/",
      backgroundColor: "#03A9F4",
      iconClass: "ri-twitter-x-line",
    },
    {
      url: "https://www.linkedin.com/",
      backgroundColor: "#007AB9",
      iconClass: "ri-linkedin-fill",
    },
  ],
  propertyDetails: [
    { label: "Property ID", value: "P1001" },
    { label: "Year Built", value: "2010" },
    { label: "Property Type", value: "Residential" },
    { label: "Listing Date", value: "Sep 15, 2024" },
  ],
};

export default function App() {
  return <Profile userData={userData} />;
}
