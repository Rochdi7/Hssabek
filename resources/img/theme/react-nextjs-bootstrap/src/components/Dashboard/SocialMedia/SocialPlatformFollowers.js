"use client";

import Image from "next/image";
import { Row, Col, Card } from "react-bootstrap";

// Sample dynamic data for social platforms
const socialPlatformsData = [
  {
    id: 1,
    name: "Instagram",
    icon: "/images/instagram.png",
    followers: "345k",
    growth: {
      percentage: "3.5%",
      trend: "up",
    },
  },
  {
    id: 2,
    name: "LinkedIn",
    icon: "/images/linkedin.png",
    followers: "56.3k",
    growth: {
      percentage: "2.1%",
      trend: "down",
    },
  },
  {
    id: 3,
    name: "TikTok",
    icon: "/images/tiktok.png",
    followers: "132k",
    growth: {
      percentage: "6.3%",
      trend: "up",
    },
  },
  {
    id: 4,
    name: "Facebook",
    icon: "/images/facebook.png",
    followers: "98.5k",
    growth: {
      percentage: "2.6%",
      trend: "up",
    },
  },
  {
    id: 5,
    name: "X (Twitter)",
    icon: "/images/x.png",
    followers: "75.2k",
    growth: {
      percentage: "3.5%",
      trend: "up",
    },
  },
  {
    id: 6,
    name: "YouTube",
    icon: "/images/youtube.png",
    followers: "84.7k",
    growth: {
      percentage: "5.2%",
      trend: "down",
    },
  },
];

const SocialPlatformFollowers = () => {
  return (
    <Row>
      {socialPlatformsData.map((platform) => (
        <Col sm={4} key={platform.id}>
          <Card className="custom-shadow rounded-3 bg-white border mb-4">
            <div className="p-4">
              <Image
                src={platform.icon}
                className="mb-3"
                alt={platform.name}
                width={40}
                height={40}
              />

              <h2 className="fs-36 fw-medium mb-0 lh-1">
                {platform.followers}
              </h2>

              <span
                className="text-body-color-60 d-block mb-4"
                style={{ color: "#8695aa" }}
              >
                Followers
              </span>

              <div className="d-flex align-items-center justify-content-between">
                <span className="fs-12">This Month</span>
                <div
                  className={`d-flex align-items-center rounded-1 ${
                    platform.growth.trend === "up"
                      ? "text-success-50"
                      : "text-danger-50"
                  }`}
                  style={{
                    backgroundColor:
                      platform.growth.trend === "up" ? "#D8FFC8" : "#FFE1DD",
                    padding: "0.6px 4px",
                  }}
                >
                  <div
                    className={`ri-arrow-${
                      platform.growth.trend === "up" ? "up" : "down"
                    }-line fs-12`}
                  ></div>
                  <div className="fs-12" style={{ marginLeft: "3px" }}>
                    {platform.growth.percentage}
                  </div>
                </div>
              </div>
            </div>
          </Card>
        </Col>
      ))}
    </Row>
  );
};

export default SocialPlatformFollowers;
