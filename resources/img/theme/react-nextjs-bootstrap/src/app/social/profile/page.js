"use client";
  
import React, { useState } from "react";
import { Row, Col, Breadcrumb } from "react-bootstrap";
import Profile from '@/components/Social/Profile';
import Friends from '@/components/Social/Profile/Friends';
import ProfileIntro from '@/components/Social/Profile/ProfileIntro';
import Followers from '@/components/Social/Profile/Followers';
import Following from '@/components/Social/Profile/Following';
import Photos from '@/components/Social/Profile/Photos';
import CreatePost from "@/components/Social/Profile/CreatePost";
import About from "@/components/Social/Profile/About";
import Activity from "@/components/Social/Profile/Activity";

export default function Page() {

  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Profile</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Social</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Profile</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col xxl={9}>
          <Profile />

          <ul className="nav nav-tabs profile-tabs border-0 justify-content-center gap-2 mb-4">
            <li className="nav-item">
              <button 
                onClick={() => handleTabClick(0)}
                className={`nav-link border-1 border-primary rounded-2 fw-medium ${
                  activeTab === 0
                    ? "active"
                    : ""
                }`}
              >
                Timeline
              </button>
            </li>
            <li className="nav-item">
              <button  
                onClick={() => handleTabClick(1)}
                className={`nav-link border-1 border-primary rounded-2 fw-medium ${
                  activeTab === 1
                    ? "active"
                    : ""
                }`}
              >
                About
              </button>
            </li>
            <li className="nav-item">
              <button  
                onClick={() => handleTabClick(2)}
                className={`nav-link border-1 border-primary rounded-2 fw-medium ${
                  activeTab === 2
                    ? "active"
                    : ""
                }`}
              >
                Activity
              </button>
            </li>
          </ul>

          <Row>
            <Col lg={4} className="order-2 order-lg-1">
              <Friends />
            </Col>

            <Col lg={8} className="order-1 order-lg-2">
              {activeTab === 0 && <CreatePost />}
              {activeTab === 1 && (
                <About />
              )}
              {activeTab === 2 && (
                <Activity />
              )}
            </Col>
          </Row>
        </Col>

        <Col xxl={3}>
          <ProfileIntro />

          <Followers />

          <Following />

          <Photos />
        </Col>
      </Row>
    </>
  );
}
