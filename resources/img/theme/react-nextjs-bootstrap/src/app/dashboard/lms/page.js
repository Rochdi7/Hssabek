import { Row, Col } from "react-bootstrap";
import Welcome from "@/components/Dashboard/LMS/Welcome";
import TotalCourses from "@/components/Dashboard/LMS/TotalCourses";
import TotalEnrolled from "@/components/Dashboard/LMS/TotalEnrolled";
import TotalMentors from "@/components/Dashboard/LMS/TotalMentors";
import StudentsInterestedTopics from "@/components/Dashboard/LMS/StudentsInterestedTopics";
import TopInstructors from "@/components/Dashboard/LMS/TopInstructors";
import StudentsProgress from "@/components/Dashboard/LMS/StudentsProgress";
import GroupLessons from "@/components/Dashboard/LMS/GroupLessons";
import EnrolledByCountries from "@/components/Dashboard/LMS/EnrolledByCountries";
import Courses from "@/components/Dashboard/LMS/Courses";
import CoursesSales from "@/components/Dashboard/LMS/CoursesSales";
import TimeSpent from "@/components/Dashboard/LMS/TimeSpent";
import OurTopCourses from "@/components/Dashboard/LMS/OurTopCourses";

export default function Page() {
  return (
    <>
      <Row className="justify-content-center">
        <Col xs={12} lg={12} xl={12} xxl={6}>
          <Welcome />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalCourses />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalEnrolled />
        </Col>

        <Col xs={12} sm={6} lg={4} xl={4} xxl={2}>
          <TotalMentors />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={6} xl={6} xxl={7}>
          <StudentsInterestedTopics />
        </Col>

        <Col xs={12} lg={6} xl={6} xxl={5}>
          <TopInstructors />
        </Col>
      </Row>
 
      <Row className="justify-content-center">
        <Col xs={12} lg={12} xl={12} xxl={4}>
          <StudentsProgress />
        </Col>

        <Col xs={12} lg={6} xl={6} xxl={4}>
          <GroupLessons />
        </Col>

        <Col xs={12} lg={6} xl={6} xxl={4}>
          <EnrolledByCountries />
        </Col>
      </Row>

      <Courses />
 
      <Row className="justify-content-center">
        <Col xs={12} md={6} lg={6} xl={12} xxl={4}>
          <CoursesSales />
        </Col>

        <Col xs={12} md={6} lg={6} xl={6} xxl={4}>
          <TimeSpent />
        </Col>

        <Col xs={12} md={6} lg={6} xl={6} xxl={4}>
          <OurTopCourses />
        </Col>
      </Row>
    </>
  );
}
