<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'classes/model/ListPausedPeer.php';

/**
 * Base class that represents a row from the 'LIST_PAUSED' table.
 *
 * 
 *
 * @package    workflow.classes.model.om
 */
abstract class BaseListPaused extends BaseObject implements Persistent
{

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ListPausedPeer
    */
    protected static $peer;

    /**
     * The value for the app_uid field.
     * @var        string
     */
    protected $app_uid = '';

    /**
     * The value for the del_index field.
     * @var        int
     */
    protected $del_index = 0;

    /**
     * The value for the usr_uid field.
     * @var        string
     */
    protected $usr_uid = '';

    /**
     * The value for the tas_uid field.
     * @var        string
     */
    protected $tas_uid = '';

    /**
     * The value for the pro_uid field.
     * @var        string
     */
    protected $pro_uid = '';

    /**
     * The value for the app_number field.
     * @var        int
     */
    protected $app_number = 0;

    /**
     * The value for the app_title field.
     * @var        string
     */
    protected $app_title = '';

    /**
     * The value for the app_pro_title field.
     * @var        string
     */
    protected $app_pro_title = '';

    /**
     * The value for the app_tas_title field.
     * @var        string
     */
    protected $app_tas_title = '';

    /**
     * The value for the app_paused_date field.
     * @var        int
     */
    protected $app_paused_date;

    /**
     * The value for the app_restart_date field.
     * @var        int
     */
    protected $app_restart_date;

    /**
     * The value for the del_previous_usr_uid field.
     * @var        string
     */
    protected $del_previous_usr_uid = '';

    /**
     * The value for the del_previous_usr_username field.
     * @var        string
     */
    protected $del_previous_usr_username = '';

    /**
     * The value for the del_previous_usr_firstname field.
     * @var        string
     */
    protected $del_previous_usr_firstname = '';

    /**
     * The value for the del_previous_usr_lastname field.
     * @var        string
     */
    protected $del_previous_usr_lastname = '';

    /**
     * The value for the del_current_usr_username field.
     * @var        string
     */
    protected $del_current_usr_username = '';

    /**
     * The value for the del_current_usr_firstname field.
     * @var        string
     */
    protected $del_current_usr_firstname = '';

    /**
     * The value for the del_current_usr_lastname field.
     * @var        string
     */
    protected $del_current_usr_lastname = '';

    /**
     * The value for the del_delegate_date field.
     * @var        int
     */
    protected $del_delegate_date;

    /**
     * The value for the del_init_date field.
     * @var        int
     */
    protected $del_init_date;

    /**
     * The value for the del_due_date field.
     * @var        int
     */
    protected $del_due_date;

    /**
     * The value for the del_priority field.
     * @var        string
     */
    protected $del_priority = '3';

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Get the [app_uid] column value.
     * 
     * @return     string
     */
    public function getAppUid()
    {

        return $this->app_uid;
    }

    /**
     * Get the [del_index] column value.
     * 
     * @return     int
     */
    public function getDelIndex()
    {

        return $this->del_index;
    }

    /**
     * Get the [usr_uid] column value.
     * 
     * @return     string
     */
    public function getUsrUid()
    {

        return $this->usr_uid;
    }

    /**
     * Get the [tas_uid] column value.
     * 
     * @return     string
     */
    public function getTasUid()
    {

        return $this->tas_uid;
    }

    /**
     * Get the [pro_uid] column value.
     * 
     * @return     string
     */
    public function getProUid()
    {

        return $this->pro_uid;
    }

    /**
     * Get the [app_number] column value.
     * 
     * @return     int
     */
    public function getAppNumber()
    {

        return $this->app_number;
    }

    /**
     * Get the [app_title] column value.
     * 
     * @return     string
     */
    public function getAppTitle()
    {

        return $this->app_title;
    }

    /**
     * Get the [app_pro_title] column value.
     * 
     * @return     string
     */
    public function getAppProTitle()
    {

        return $this->app_pro_title;
    }

    /**
     * Get the [app_tas_title] column value.
     * 
     * @return     string
     */
    public function getAppTasTitle()
    {

        return $this->app_tas_title;
    }

    /**
     * Get the [optionally formatted] [app_paused_date] column value.
     * 
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                          If format is NULL, then the integer unix timestamp will be returned.
     * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
     * @throws     PropelException - if unable to convert the date/time to timestamp.
     */
    public function getAppPausedDate($format = 'Y-m-d H:i:s')
    {

        if ($this->app_paused_date === null || $this->app_paused_date === '') {
            return null;
        } elseif (!is_int($this->app_paused_date)) {
            // a non-timestamp value was set externally, so we convert it
            $ts = strtotime($this->app_paused_date);
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse value of [app_paused_date] as date/time value: " .
                    var_export($this->app_paused_date, true));
            }
        } else {
            $ts = $this->app_paused_date;
        }
        if ($format === null) {
            return $ts;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $ts);
        } else {
            return date($format, $ts);
        }
    }

    /**
     * Get the [optionally formatted] [app_restart_date] column value.
     * 
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                          If format is NULL, then the integer unix timestamp will be returned.
     * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
     * @throws     PropelException - if unable to convert the date/time to timestamp.
     */
    public function getAppRestartDate($format = 'Y-m-d H:i:s')
    {

        if ($this->app_restart_date === null || $this->app_restart_date === '') {
            return null;
        } elseif (!is_int($this->app_restart_date)) {
            // a non-timestamp value was set externally, so we convert it
            $ts = strtotime($this->app_restart_date);
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse value of [app_restart_date] as date/time value: " .
                    var_export($this->app_restart_date, true));
            }
        } else {
            $ts = $this->app_restart_date;
        }
        if ($format === null) {
            return $ts;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $ts);
        } else {
            return date($format, $ts);
        }
    }

    /**
     * Get the [del_previous_usr_uid] column value.
     * 
     * @return     string
     */
    public function getDelPreviousUsrUid()
    {

        return $this->del_previous_usr_uid;
    }

    /**
     * Get the [del_previous_usr_username] column value.
     * 
     * @return     string
     */
    public function getDelPreviousUsrUsername()
    {

        return $this->del_previous_usr_username;
    }

    /**
     * Get the [del_previous_usr_firstname] column value.
     * 
     * @return     string
     */
    public function getDelPreviousUsrFirstname()
    {

        return $this->del_previous_usr_firstname;
    }

    /**
     * Get the [del_previous_usr_lastname] column value.
     * 
     * @return     string
     */
    public function getDelPreviousUsrLastname()
    {

        return $this->del_previous_usr_lastname;
    }

    /**
     * Get the [del_current_usr_username] column value.
     * 
     * @return     string
     */
    public function getDelCurrentUsrUsername()
    {

        return $this->del_current_usr_username;
    }

    /**
     * Get the [del_current_usr_firstname] column value.
     * 
     * @return     string
     */
    public function getDelCurrentUsrFirstname()
    {

        return $this->del_current_usr_firstname;
    }

    /**
     * Get the [del_current_usr_lastname] column value.
     * 
     * @return     string
     */
    public function getDelCurrentUsrLastname()
    {

        return $this->del_current_usr_lastname;
    }

    /**
     * Get the [optionally formatted] [del_delegate_date] column value.
     * 
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                          If format is NULL, then the integer unix timestamp will be returned.
     * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
     * @throws     PropelException - if unable to convert the date/time to timestamp.
     */
    public function getDelDelegateDate($format = 'Y-m-d H:i:s')
    {

        if ($this->del_delegate_date === null || $this->del_delegate_date === '') {
            return null;
        } elseif (!is_int($this->del_delegate_date)) {
            // a non-timestamp value was set externally, so we convert it
            $ts = strtotime($this->del_delegate_date);
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse value of [del_delegate_date] as date/time value: " .
                    var_export($this->del_delegate_date, true));
            }
        } else {
            $ts = $this->del_delegate_date;
        }
        if ($format === null) {
            return $ts;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $ts);
        } else {
            return date($format, $ts);
        }
    }

    /**
     * Get the [optionally formatted] [del_init_date] column value.
     * 
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                          If format is NULL, then the integer unix timestamp will be returned.
     * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
     * @throws     PropelException - if unable to convert the date/time to timestamp.
     */
    public function getDelInitDate($format = 'Y-m-d H:i:s')
    {

        if ($this->del_init_date === null || $this->del_init_date === '') {
            return null;
        } elseif (!is_int($this->del_init_date)) {
            // a non-timestamp value was set externally, so we convert it
            $ts = strtotime($this->del_init_date);
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse value of [del_init_date] as date/time value: " .
                    var_export($this->del_init_date, true));
            }
        } else {
            $ts = $this->del_init_date;
        }
        if ($format === null) {
            return $ts;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $ts);
        } else {
            return date($format, $ts);
        }
    }

    /**
     * Get the [optionally formatted] [del_due_date] column value.
     * 
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                          If format is NULL, then the integer unix timestamp will be returned.
     * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
     * @throws     PropelException - if unable to convert the date/time to timestamp.
     */
    public function getDelDueDate($format = 'Y-m-d H:i:s')
    {

        if ($this->del_due_date === null || $this->del_due_date === '') {
            return null;
        } elseif (!is_int($this->del_due_date)) {
            // a non-timestamp value was set externally, so we convert it
            $ts = strtotime($this->del_due_date);
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse value of [del_due_date] as date/time value: " .
                    var_export($this->del_due_date, true));
            }
        } else {
            $ts = $this->del_due_date;
        }
        if ($format === null) {
            return $ts;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $ts);
        } else {
            return date($format, $ts);
        }
    }

    /**
     * Get the [del_priority] column value.
     * 
     * @return     string
     */
    public function getDelPriority()
    {

        return $this->del_priority;
    }

    /**
     * Set the value of [app_uid] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setAppUid($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->app_uid !== $v || $v === '') {
            $this->app_uid = $v;
            $this->modifiedColumns[] = ListPausedPeer::APP_UID;
        }

    } // setAppUid()

    /**
     * Set the value of [del_index] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setDelIndex($v)
    {

        // Since the native PHP type for this column is integer,
        // we will cast the input value to an int (if it is not).
        if ($v !== null && !is_int($v) && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->del_index !== $v || $v === 0) {
            $this->del_index = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_INDEX;
        }

    } // setDelIndex()

    /**
     * Set the value of [usr_uid] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setUsrUid($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->usr_uid !== $v || $v === '') {
            $this->usr_uid = $v;
            $this->modifiedColumns[] = ListPausedPeer::USR_UID;
        }

    } // setUsrUid()

    /**
     * Set the value of [tas_uid] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setTasUid($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->tas_uid !== $v || $v === '') {
            $this->tas_uid = $v;
            $this->modifiedColumns[] = ListPausedPeer::TAS_UID;
        }

    } // setTasUid()

    /**
     * Set the value of [pro_uid] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setProUid($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->pro_uid !== $v || $v === '') {
            $this->pro_uid = $v;
            $this->modifiedColumns[] = ListPausedPeer::PRO_UID;
        }

    } // setProUid()

    /**
     * Set the value of [app_number] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setAppNumber($v)
    {

        // Since the native PHP type for this column is integer,
        // we will cast the input value to an int (if it is not).
        if ($v !== null && !is_int($v) && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->app_number !== $v || $v === 0) {
            $this->app_number = $v;
            $this->modifiedColumns[] = ListPausedPeer::APP_NUMBER;
        }

    } // setAppNumber()

    /**
     * Set the value of [app_title] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setAppTitle($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->app_title !== $v || $v === '') {
            $this->app_title = $v;
            $this->modifiedColumns[] = ListPausedPeer::APP_TITLE;
        }

    } // setAppTitle()

    /**
     * Set the value of [app_pro_title] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setAppProTitle($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->app_pro_title !== $v || $v === '') {
            $this->app_pro_title = $v;
            $this->modifiedColumns[] = ListPausedPeer::APP_PRO_TITLE;
        }

    } // setAppProTitle()

    /**
     * Set the value of [app_tas_title] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setAppTasTitle($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->app_tas_title !== $v || $v === '') {
            $this->app_tas_title = $v;
            $this->modifiedColumns[] = ListPausedPeer::APP_TAS_TITLE;
        }

    } // setAppTasTitle()

    /**
     * Set the value of [app_paused_date] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setAppPausedDate($v)
    {

        if ($v !== null && !is_int($v)) {
            $ts = strtotime($v);
            //Date/time accepts null values
            if ($v == '') {
                $ts = null;
            }
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse date/time value for [app_paused_date] from input: " .
                    var_export($v, true));
            }
        } else {
            $ts = $v;
        }
        if ($this->app_paused_date !== $ts) {
            $this->app_paused_date = $ts;
            $this->modifiedColumns[] = ListPausedPeer::APP_PAUSED_DATE;
        }

    } // setAppPausedDate()

    /**
     * Set the value of [app_restart_date] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setAppRestartDate($v)
    {

        if ($v !== null && !is_int($v)) {
            $ts = strtotime($v);
            //Date/time accepts null values
            if ($v == '') {
                $ts = null;
            }
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse date/time value for [app_restart_date] from input: " .
                    var_export($v, true));
            }
        } else {
            $ts = $v;
        }
        if ($this->app_restart_date !== $ts) {
            $this->app_restart_date = $ts;
            $this->modifiedColumns[] = ListPausedPeer::APP_RESTART_DATE;
        }

    } // setAppRestartDate()

    /**
     * Set the value of [del_previous_usr_uid] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelPreviousUsrUid($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_previous_usr_uid !== $v || $v === '') {
            $this->del_previous_usr_uid = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_PREVIOUS_USR_UID;
        }

    } // setDelPreviousUsrUid()

    /**
     * Set the value of [del_previous_usr_username] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelPreviousUsrUsername($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_previous_usr_username !== $v || $v === '') {
            $this->del_previous_usr_username = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_PREVIOUS_USR_USERNAME;
        }

    } // setDelPreviousUsrUsername()

    /**
     * Set the value of [del_previous_usr_firstname] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelPreviousUsrFirstname($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_previous_usr_firstname !== $v || $v === '') {
            $this->del_previous_usr_firstname = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_PREVIOUS_USR_FIRSTNAME;
        }

    } // setDelPreviousUsrFirstname()

    /**
     * Set the value of [del_previous_usr_lastname] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelPreviousUsrLastname($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_previous_usr_lastname !== $v || $v === '') {
            $this->del_previous_usr_lastname = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_PREVIOUS_USR_LASTNAME;
        }

    } // setDelPreviousUsrLastname()

    /**
     * Set the value of [del_current_usr_username] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelCurrentUsrUsername($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_current_usr_username !== $v || $v === '') {
            $this->del_current_usr_username = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_CURRENT_USR_USERNAME;
        }

    } // setDelCurrentUsrUsername()

    /**
     * Set the value of [del_current_usr_firstname] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelCurrentUsrFirstname($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_current_usr_firstname !== $v || $v === '') {
            $this->del_current_usr_firstname = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_CURRENT_USR_FIRSTNAME;
        }

    } // setDelCurrentUsrFirstname()

    /**
     * Set the value of [del_current_usr_lastname] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelCurrentUsrLastname($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_current_usr_lastname !== $v || $v === '') {
            $this->del_current_usr_lastname = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_CURRENT_USR_LASTNAME;
        }

    } // setDelCurrentUsrLastname()

    /**
     * Set the value of [del_delegate_date] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setDelDelegateDate($v)
    {

        if ($v !== null && !is_int($v)) {
            $ts = strtotime($v);
            //Date/time accepts null values
            if ($v == '') {
                $ts = null;
            }
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse date/time value for [del_delegate_date] from input: " .
                    var_export($v, true));
            }
        } else {
            $ts = $v;
        }
        if ($this->del_delegate_date !== $ts) {
            $this->del_delegate_date = $ts;
            $this->modifiedColumns[] = ListPausedPeer::DEL_DELEGATE_DATE;
        }

    } // setDelDelegateDate()

    /**
     * Set the value of [del_init_date] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setDelInitDate($v)
    {

        if ($v !== null && !is_int($v)) {
            $ts = strtotime($v);
            //Date/time accepts null values
            if ($v == '') {
                $ts = null;
            }
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse date/time value for [del_init_date] from input: " .
                    var_export($v, true));
            }
        } else {
            $ts = $v;
        }
        if ($this->del_init_date !== $ts) {
            $this->del_init_date = $ts;
            $this->modifiedColumns[] = ListPausedPeer::DEL_INIT_DATE;
        }

    } // setDelInitDate()

    /**
     * Set the value of [del_due_date] column.
     * 
     * @param      int $v new value
     * @return     void
     */
    public function setDelDueDate($v)
    {

        if ($v !== null && !is_int($v)) {
            $ts = strtotime($v);
            //Date/time accepts null values
            if ($v == '') {
                $ts = null;
            }
            if ($ts === -1 || $ts === false) {
                throw new PropelException("Unable to parse date/time value for [del_due_date] from input: " .
                    var_export($v, true));
            }
        } else {
            $ts = $v;
        }
        if ($this->del_due_date !== $ts) {
            $this->del_due_date = $ts;
            $this->modifiedColumns[] = ListPausedPeer::DEL_DUE_DATE;
        }

    } // setDelDueDate()

    /**
     * Set the value of [del_priority] column.
     * 
     * @param      string $v new value
     * @return     void
     */
    public function setDelPriority($v)
    {

        // Since the native PHP type for this column is string,
        // we will cast the input to a string (if it is not).
        if ($v !== null && !is_string($v)) {
            $v = (string) $v;
        }

        if ($this->del_priority !== $v || $v === '3') {
            $this->del_priority = $v;
            $this->modifiedColumns[] = ListPausedPeer::DEL_PRIORITY;
        }

    } // setDelPriority()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (1-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
     * @param      int $startcol 1-based offset column which indicates which restultset column to start with.
     * @return     int next starting column
     * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate(ResultSet $rs, $startcol = 1)
    {
        try {

            $this->app_uid = $rs->getString($startcol + 0);

            $this->del_index = $rs->getInt($startcol + 1);

            $this->usr_uid = $rs->getString($startcol + 2);

            $this->tas_uid = $rs->getString($startcol + 3);

            $this->pro_uid = $rs->getString($startcol + 4);

            $this->app_number = $rs->getInt($startcol + 5);

            $this->app_title = $rs->getString($startcol + 6);

            $this->app_pro_title = $rs->getString($startcol + 7);

            $this->app_tas_title = $rs->getString($startcol + 8);

            $this->app_paused_date = $rs->getTimestamp($startcol + 9, null);

            $this->app_restart_date = $rs->getTimestamp($startcol + 10, null);

            $this->del_previous_usr_uid = $rs->getString($startcol + 11);

            $this->del_previous_usr_username = $rs->getString($startcol + 12);

            $this->del_previous_usr_firstname = $rs->getString($startcol + 13);

            $this->del_previous_usr_lastname = $rs->getString($startcol + 14);

            $this->del_current_usr_username = $rs->getString($startcol + 15);

            $this->del_current_usr_firstname = $rs->getString($startcol + 16);

            $this->del_current_usr_lastname = $rs->getString($startcol + 17);

            $this->del_delegate_date = $rs->getTimestamp($startcol + 18, null);

            $this->del_init_date = $rs->getTimestamp($startcol + 19, null);

            $this->del_due_date = $rs->getTimestamp($startcol + 20, null);

            $this->del_priority = $rs->getString($startcol + 21);

            $this->resetModified();

            $this->setNew(false);

            // FIXME - using NUM_COLUMNS may be clearer.
            return $startcol + 22; // 22 = ListPausedPeer::NUM_COLUMNS - ListPausedPeer::NUM_LAZY_LOAD_COLUMNS).

        } catch (Exception $e) {
            throw new PropelException("Error populating ListPaused object", $e);
        }
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      Connection $con
     * @return     void
     * @throws     PropelException
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete($con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ListPausedPeer::DATABASE_NAME);
        }

        try {
            $con->begin();
            ListPausedPeer::doDelete($this, $con);
            $this->setDeleted(true);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Stores the object in the database.  If the object is new,
     * it inserts it; otherwise an update is performed.  This method
     * wraps the doSave() worker method in a transaction.
     *
     * @param      Connection $con
     * @return     int The number of rows affected by this insert/update
     * @throws     PropelException
     * @see        doSave()
     */
    public function save($con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ListPausedPeer::DATABASE_NAME);
        }

        try {
            $con->begin();
            $affectedRows = $this->doSave($con);
            $con->commit();
            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Stores the object in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      Connection $con
     * @return     int The number of rows affected by this insert/update and any referring
     * @throws     PropelException
     * @see        save()
     */
    protected function doSave($con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;


            // If this object has been modified, then save it to the database.
            if ($this->isModified()) {
                if ($this->isNew()) {
                    $pk = ListPausedPeer::doInsert($this, $con);
                    $affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
                                         // should always be true here (even though technically
                                         // BasePeer::doInsert() can insert multiple rows).

                    $this->setNew(false);
                } else {
                    $affectedRows += ListPausedPeer::doUpdate($this, $con);
                }
                $this->resetModified(); // [HL] After being saved an object is no longer 'modified'
            }

            $this->alreadyInSave = false;
        }
        return $affectedRows;
    } // doSave()

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return     array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return     boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();
            return true;
        } else {
            $this->validationFailures = $res;
            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return     mixed <code>true</code> if all validations pass; 
                   array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = ListPausedPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TYPE_PHPNAME,
     *                     TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
     * @return     mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ListPausedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        return $this->getByPosition($pos);
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return     mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch($pos) {
            case 0:
                return $this->getAppUid();
                break;
            case 1:
                return $this->getDelIndex();
                break;
            case 2:
                return $this->getUsrUid();
                break;
            case 3:
                return $this->getTasUid();
                break;
            case 4:
                return $this->getProUid();
                break;
            case 5:
                return $this->getAppNumber();
                break;
            case 6:
                return $this->getAppTitle();
                break;
            case 7:
                return $this->getAppProTitle();
                break;
            case 8:
                return $this->getAppTasTitle();
                break;
            case 9:
                return $this->getAppPausedDate();
                break;
            case 10:
                return $this->getAppRestartDate();
                break;
            case 11:
                return $this->getDelPreviousUsrUid();
                break;
            case 12:
                return $this->getDelPreviousUsrUsername();
                break;
            case 13:
                return $this->getDelPreviousUsrFirstname();
                break;
            case 14:
                return $this->getDelPreviousUsrLastname();
                break;
            case 15:
                return $this->getDelCurrentUsrUsername();
                break;
            case 16:
                return $this->getDelCurrentUsrFirstname();
                break;
            case 17:
                return $this->getDelCurrentUsrLastname();
                break;
            case 18:
                return $this->getDelDelegateDate();
                break;
            case 19:
                return $this->getDelInitDate();
                break;
            case 20:
                return $this->getDelDueDate();
                break;
            case 21:
                return $this->getDelPriority();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param      string $keyType One of the class type constants TYPE_PHPNAME,
     *                        TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
     * @return     an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ListPausedPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAppUid(),
            $keys[1] => $this->getDelIndex(),
            $keys[2] => $this->getUsrUid(),
            $keys[3] => $this->getTasUid(),
            $keys[4] => $this->getProUid(),
            $keys[5] => $this->getAppNumber(),
            $keys[6] => $this->getAppTitle(),
            $keys[7] => $this->getAppProTitle(),
            $keys[8] => $this->getAppTasTitle(),
            $keys[9] => $this->getAppPausedDate(),
            $keys[10] => $this->getAppRestartDate(),
            $keys[11] => $this->getDelPreviousUsrUid(),
            $keys[12] => $this->getDelPreviousUsrUsername(),
            $keys[13] => $this->getDelPreviousUsrFirstname(),
            $keys[14] => $this->getDelPreviousUsrLastname(),
            $keys[15] => $this->getDelCurrentUsrUsername(),
            $keys[16] => $this->getDelCurrentUsrFirstname(),
            $keys[17] => $this->getDelCurrentUsrLastname(),
            $keys[18] => $this->getDelDelegateDate(),
            $keys[19] => $this->getDelInitDate(),
            $keys[20] => $this->getDelDueDate(),
            $keys[21] => $this->getDelPriority(),
        );
        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TYPE_PHPNAME,
     *                     TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM
     * @return     void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ListPausedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return     void
     */
    public function setByPosition($pos, $value)
    {
        switch($pos) {
            case 0:
                $this->setAppUid($value);
                break;
            case 1:
                $this->setDelIndex($value);
                break;
            case 2:
                $this->setUsrUid($value);
                break;
            case 3:
                $this->setTasUid($value);
                break;
            case 4:
                $this->setProUid($value);
                break;
            case 5:
                $this->setAppNumber($value);
                break;
            case 6:
                $this->setAppTitle($value);
                break;
            case 7:
                $this->setAppProTitle($value);
                break;
            case 8:
                $this->setAppTasTitle($value);
                break;
            case 9:
                $this->setAppPausedDate($value);
                break;
            case 10:
                $this->setAppRestartDate($value);
                break;
            case 11:
                $this->setDelPreviousUsrUid($value);
                break;
            case 12:
                $this->setDelPreviousUsrUsername($value);
                break;
            case 13:
                $this->setDelPreviousUsrFirstname($value);
                break;
            case 14:
                $this->setDelPreviousUsrLastname($value);
                break;
            case 15:
                $this->setDelCurrentUsrUsername($value);
                break;
            case 16:
                $this->setDelCurrentUsrFirstname($value);
                break;
            case 17:
                $this->setDelCurrentUsrLastname($value);
                break;
            case 18:
                $this->setDelDelegateDate($value);
                break;
            case 19:
                $this->setDelInitDate($value);
                break;
            case 20:
                $this->setDelDueDate($value);
                break;
            case 21:
                $this->setDelPriority($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME,
     * TYPE_NUM. The default key type is the column's phpname (e.g. 'authorId')
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return     void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ListPausedPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setAppUid($arr[$keys[0]]);
        }

        if (array_key_exists($keys[1], $arr)) {
            $this->setDelIndex($arr[$keys[1]]);
        }

        if (array_key_exists($keys[2], $arr)) {
            $this->setUsrUid($arr[$keys[2]]);
        }

        if (array_key_exists($keys[3], $arr)) {
            $this->setTasUid($arr[$keys[3]]);
        }

        if (array_key_exists($keys[4], $arr)) {
            $this->setProUid($arr[$keys[4]]);
        }

        if (array_key_exists($keys[5], $arr)) {
            $this->setAppNumber($arr[$keys[5]]);
        }

        if (array_key_exists($keys[6], $arr)) {
            $this->setAppTitle($arr[$keys[6]]);
        }

        if (array_key_exists($keys[7], $arr)) {
            $this->setAppProTitle($arr[$keys[7]]);
        }

        if (array_key_exists($keys[8], $arr)) {
            $this->setAppTasTitle($arr[$keys[8]]);
        }

        if (array_key_exists($keys[9], $arr)) {
            $this->setAppPausedDate($arr[$keys[9]]);
        }

        if (array_key_exists($keys[10], $arr)) {
            $this->setAppRestartDate($arr[$keys[10]]);
        }

        if (array_key_exists($keys[11], $arr)) {
            $this->setDelPreviousUsrUid($arr[$keys[11]]);
        }

        if (array_key_exists($keys[12], $arr)) {
            $this->setDelPreviousUsrUsername($arr[$keys[12]]);
        }

        if (array_key_exists($keys[13], $arr)) {
            $this->setDelPreviousUsrFirstname($arr[$keys[13]]);
        }

        if (array_key_exists($keys[14], $arr)) {
            $this->setDelPreviousUsrLastname($arr[$keys[14]]);
        }

        if (array_key_exists($keys[15], $arr)) {
            $this->setDelCurrentUsrUsername($arr[$keys[15]]);
        }

        if (array_key_exists($keys[16], $arr)) {
            $this->setDelCurrentUsrFirstname($arr[$keys[16]]);
        }

        if (array_key_exists($keys[17], $arr)) {
            $this->setDelCurrentUsrLastname($arr[$keys[17]]);
        }

        if (array_key_exists($keys[18], $arr)) {
            $this->setDelDelegateDate($arr[$keys[18]]);
        }

        if (array_key_exists($keys[19], $arr)) {
            $this->setDelInitDate($arr[$keys[19]]);
        }

        if (array_key_exists($keys[20], $arr)) {
            $this->setDelDueDate($arr[$keys[20]]);
        }

        if (array_key_exists($keys[21], $arr)) {
            $this->setDelPriority($arr[$keys[21]]);
        }

    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return     Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ListPausedPeer::DATABASE_NAME);

        if ($this->isColumnModified(ListPausedPeer::APP_UID)) {
            $criteria->add(ListPausedPeer::APP_UID, $this->app_uid);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_INDEX)) {
            $criteria->add(ListPausedPeer::DEL_INDEX, $this->del_index);
        }

        if ($this->isColumnModified(ListPausedPeer::USR_UID)) {
            $criteria->add(ListPausedPeer::USR_UID, $this->usr_uid);
        }

        if ($this->isColumnModified(ListPausedPeer::TAS_UID)) {
            $criteria->add(ListPausedPeer::TAS_UID, $this->tas_uid);
        }

        if ($this->isColumnModified(ListPausedPeer::PRO_UID)) {
            $criteria->add(ListPausedPeer::PRO_UID, $this->pro_uid);
        }

        if ($this->isColumnModified(ListPausedPeer::APP_NUMBER)) {
            $criteria->add(ListPausedPeer::APP_NUMBER, $this->app_number);
        }

        if ($this->isColumnModified(ListPausedPeer::APP_TITLE)) {
            $criteria->add(ListPausedPeer::APP_TITLE, $this->app_title);
        }

        if ($this->isColumnModified(ListPausedPeer::APP_PRO_TITLE)) {
            $criteria->add(ListPausedPeer::APP_PRO_TITLE, $this->app_pro_title);
        }

        if ($this->isColumnModified(ListPausedPeer::APP_TAS_TITLE)) {
            $criteria->add(ListPausedPeer::APP_TAS_TITLE, $this->app_tas_title);
        }

        if ($this->isColumnModified(ListPausedPeer::APP_PAUSED_DATE)) {
            $criteria->add(ListPausedPeer::APP_PAUSED_DATE, $this->app_paused_date);
        }

        if ($this->isColumnModified(ListPausedPeer::APP_RESTART_DATE)) {
            $criteria->add(ListPausedPeer::APP_RESTART_DATE, $this->app_restart_date);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_PREVIOUS_USR_UID)) {
            $criteria->add(ListPausedPeer::DEL_PREVIOUS_USR_UID, $this->del_previous_usr_uid);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_PREVIOUS_USR_USERNAME)) {
            $criteria->add(ListPausedPeer::DEL_PREVIOUS_USR_USERNAME, $this->del_previous_usr_username);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_PREVIOUS_USR_FIRSTNAME)) {
            $criteria->add(ListPausedPeer::DEL_PREVIOUS_USR_FIRSTNAME, $this->del_previous_usr_firstname);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_PREVIOUS_USR_LASTNAME)) {
            $criteria->add(ListPausedPeer::DEL_PREVIOUS_USR_LASTNAME, $this->del_previous_usr_lastname);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_CURRENT_USR_USERNAME)) {
            $criteria->add(ListPausedPeer::DEL_CURRENT_USR_USERNAME, $this->del_current_usr_username);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_CURRENT_USR_FIRSTNAME)) {
            $criteria->add(ListPausedPeer::DEL_CURRENT_USR_FIRSTNAME, $this->del_current_usr_firstname);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_CURRENT_USR_LASTNAME)) {
            $criteria->add(ListPausedPeer::DEL_CURRENT_USR_LASTNAME, $this->del_current_usr_lastname);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_DELEGATE_DATE)) {
            $criteria->add(ListPausedPeer::DEL_DELEGATE_DATE, $this->del_delegate_date);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_INIT_DATE)) {
            $criteria->add(ListPausedPeer::DEL_INIT_DATE, $this->del_init_date);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_DUE_DATE)) {
            $criteria->add(ListPausedPeer::DEL_DUE_DATE, $this->del_due_date);
        }

        if ($this->isColumnModified(ListPausedPeer::DEL_PRIORITY)) {
            $criteria->add(ListPausedPeer::DEL_PRIORITY, $this->del_priority);
        }


        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return     Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ListPausedPeer::DATABASE_NAME);

        $criteria->add(ListPausedPeer::APP_UID, $this->app_uid);
        $criteria->add(ListPausedPeer::DEL_INDEX, $this->del_index);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return     array
     */
    public function getPrimaryKey()
    {
        $pks = array();

        $pks[0] = $this->getAppUid();

        $pks[1] = $this->getDelIndex();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return     void
     */
    public function setPrimaryKey($keys)
    {

        $this->setAppUid($keys[0]);

        $this->setDelIndex($keys[1]);

    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of ListPaused (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @throws     PropelException
     */
    public function copyInto($copyObj, $deepCopy = false)
    {

        $copyObj->setUsrUid($this->usr_uid);

        $copyObj->setTasUid($this->tas_uid);

        $copyObj->setProUid($this->pro_uid);

        $copyObj->setAppNumber($this->app_number);

        $copyObj->setAppTitle($this->app_title);

        $copyObj->setAppProTitle($this->app_pro_title);

        $copyObj->setAppTasTitle($this->app_tas_title);

        $copyObj->setAppPausedDate($this->app_paused_date);

        $copyObj->setAppRestartDate($this->app_restart_date);

        $copyObj->setDelPreviousUsrUid($this->del_previous_usr_uid);

        $copyObj->setDelPreviousUsrUsername($this->del_previous_usr_username);

        $copyObj->setDelPreviousUsrFirstname($this->del_previous_usr_firstname);

        $copyObj->setDelPreviousUsrLastname($this->del_previous_usr_lastname);

        $copyObj->setDelCurrentUsrUsername($this->del_current_usr_username);

        $copyObj->setDelCurrentUsrFirstname($this->del_current_usr_firstname);

        $copyObj->setDelCurrentUsrLastname($this->del_current_usr_lastname);

        $copyObj->setDelDelegateDate($this->del_delegate_date);

        $copyObj->setDelInitDate($this->del_init_date);

        $copyObj->setDelDueDate($this->del_due_date);

        $copyObj->setDelPriority($this->del_priority);


        $copyObj->setNew(true);

        $copyObj->setAppUid(''); // this is a pkey column, so set to default value

        $copyObj->setDelIndex('0'); // this is a pkey column, so set to default value

    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return     ListPaused Clone of current object.
     * @throws     PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);
        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return     ListPausedPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ListPausedPeer();
        }
        return self::$peer;
    }
}

